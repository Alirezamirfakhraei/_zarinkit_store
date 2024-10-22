<?php

namespace Botble\Zarinpal\Http\Requests;

use Botble\Support\Http\Requests\Request;

class ZarinpalPaymentCallbackRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required',
            'Authority' => 'required',
            'Status' => 'required',
        ];
    }
}
