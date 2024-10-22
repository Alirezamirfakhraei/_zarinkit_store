<?php

namespace Botble\Behpardakht\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Behpardakht\Http\Requests\BehpardakhtPaymentCallbackRequest;
use Botble\Behpardakht\Services\Gateways\BehpardakhtPaymentService;
use Botble\Payment\Supports\PaymentHelper;
use Illuminate\Routing\Controller;

class BehpardakhtController extends Controller
{
    /**
     * @param BehpardakhtPaymentCallbackRequest $request
     * @param BehpardakhtPaymentService $behpardakhtPaymentService
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function getCallback(
        BehpardakhtPaymentCallbackRequest $request,
        BehpardakhtPaymentService    $behpardakhtPaymentService,
        BaseHttpResponse             $response
    ) {
        $status = $behpardakhtPaymentService->getPaymentStatus($request);

        if (!$status) {
            return $response
                ->setError()
                ->setNextUrl(PaymentHelper::getCancelURL())
                ->withInput()
                ->setMessage(__('Payment failed!'));
        }

        $behpardakhtPaymentService->afterMakePayment($request->input());

        return $response
            ->setNextUrl(PaymentHelper::getRedirectURL())
            ->setMessage(__('Checkout successfully!'));
    }
}
