<?php

namespace Botble\Zarinpal\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Zarinpal\Http\Requests\ZarinpalPaymentCallbackRequest;
use Botble\Zarinpal\Services\Gateways\ZarinpalPaymentService;
use Botble\Payment\Supports\PaymentHelper;
use Illuminate\Routing\Controller;

class ZarinpalController extends Controller
{
    /**
     * @param ZarinpalPaymentCallbackRequest $request
     * @param ZarinpalPaymentService $zarinpalPaymentService
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function getCallback(
        ZarinpalPaymentCallbackRequest $request,
        ZarinpalPaymentService    $zarinpalPaymentService,
        BaseHttpResponse             $response
    ) {
        $status = $zarinpalPaymentService->getPaymentStatus($request);

        if (!$status) {
            return $response
                ->setError()
                ->setNextUrl(PaymentHelper::getCancelURL())
                ->withInput()
                ->setMessage(__('Payment failed!'));
        }

        $zarinpalPaymentService->afterMakePayment($request->input());

        return $response
            ->setNextUrl(PaymentHelper::getRedirectURL())
            ->setMessage(__('Checkout successfully!'));
    }
}
