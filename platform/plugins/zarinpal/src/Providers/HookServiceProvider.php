<?php

namespace Botble\Zarinpal\Providers;

use Botble\Payment\Enums\PaymentMethodEnum;
use Botble\Zarinpal\Services\Gateways\ZarinpalPaymentService;
use Html;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Throwable;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        add_filter(PAYMENT_FILTER_ADDITIONAL_PAYMENT_METHODS, [$this, 'registerZarinpalMethod'], 2, 2);

        $this->app->booted(function () {
            add_filter(PAYMENT_FILTER_AFTER_POST_CHECKOUT, [$this, 'checkoutWithZarinpal'], 2, 2);
        });

        add_filter(PAYMENT_METHODS_SETTINGS_PAGE, [$this, 'addPaymentSettings'], 2);

        add_filter(BASE_FILTER_ENUM_ARRAY, function ($values, $class) {
            if ($class == PaymentMethodEnum::class) {
                $values['ZARINPAL'] = ZARINPAL_PAYMENT_METHOD_NAME;
            }

            return $values;
        }, 2, 2);

        add_filter(BASE_FILTER_ENUM_LABEL, function ($value, $class) {
            if ($class == PaymentMethodEnum::class && $value == ZARINPAL_PAYMENT_METHOD_NAME) {
                $value = 'Zarinpal';
            }

            return $value;
        }, 2, 2);

        add_filter(BASE_FILTER_ENUM_HTML, function ($value, $class) {
            if ($class == PaymentMethodEnum::class && $value == ZARINPAL_PAYMENT_METHOD_NAME) {
                $value = Html::tag(
                    'span',
                    PaymentMethodEnum::getLabel($value),
                    ['class' => 'label-success status-label']
                )
                    ->toHtml();
            }

            return $value;
        }, 2, 2);

        add_filter(PAYMENT_FILTER_GET_SERVICE_CLASS, function ($data, $value) {
            if ($value == ZARINPAL_PAYMENT_METHOD_NAME) {
                $data = ZarinpalPaymentService::class;
            }

            return $data;
        }, 2, 2);

        add_filter(PAYMENT_FILTER_PAYMENT_INFO_DETAIL, function ($data, $payment) {
            if ($payment->payment_channel == ZARINPAL_PAYMENT_METHOD_NAME) {
                $paymentDetail = (new ZarinpalPaymentService())->getPaymentDetails($payment->charge_id);
                $data = view('plugins/zarinpal::detail', ['payment' => $paymentDetail])->render();
            }

            return $data;
        }, 2, 2);
    }

    /**
     * @param string|null $settings
     * @return string
     * @throws Throwable
     */
    public function addPaymentSettings(?string $settings): string
    {
        return $settings . view('plugins/zarinpal::settings')->render();
    }

    /**
     * @param string|null $html
     * @param array $data
     * @return string
     */
    public function registerZarinpalMethod(?string $html, array $data): string
    {
        return $html . view('plugins/zarinpal::methods', $data)->render();
    }

    /**
     * @param array $data
     * @param Request $request
     * @return array
     * @throws BindingResolutionException
     */
    public function checkoutWithZarinpal(array $data, Request $request): array
    {
        if ($request->input('payment_method') == ZARINPAL_PAYMENT_METHOD_NAME) {
            $currentCurrency = get_application_currency();
            $currencyModel = $currentCurrency->replicate();

            $zarinPalService = $this->app->make(ZarinpalPaymentService::class);

            $supportedCurrencies = $zarinPalService->supportedCurrencyCodes();

            $currency = strtoupper($currentCurrency->title);

            $notSupportCurrency = false;

            if (!in_array($currency, $supportedCurrencies)) {
                $notSupportCurrency = true;

                if (!$currencyModel->where('title', 'IRR')->exists()) {
                    $data['error'] = true;
                    $data['message'] = __(":name doesn't support :currency. List of currencies supported by :name: :currencies.", [
                        'name'       => 'zarinpal',
                        'currency'   => $currency,
                        'currencies' => implode(', ', $supportedCurrencies),
                    ]);

                    return $data;
                }
            }

            $paymentData = apply_filters(PAYMENT_FILTER_PAYMENT_DATA, [], $request);

            if ($notSupportCurrency) {
                $irrCurrency = $currencyModel->where('title', 'IRR')->first();

                $paymentData['currency'] = 'IRR';
                if ($currentCurrency->is_default) {
                    $paymentData['amount'] = $paymentData['amount'] * $irrCurrency->exchange_rate;
                } else {
                    $paymentData['amount'] = format_price($paymentData['amount'], $currentCurrency, true);
                }
            }

            if (!$request->input('callback_url')) {
                $paymentData['callback_url'] = route('payments.zarinpal.status',['amount' => $paymentData['amount']]);
            }

            $checkoutUrl = $zarinPalService->execute($paymentData);

            if ($checkoutUrl) {
                $data['checkoutUrl'] = $checkoutUrl;
            } else {
                $data['error'] = true;
                $data['message'] = $zarinPalService->getErrorMessage();
            }

            return $data;
        }

        return $data;
    }
}
