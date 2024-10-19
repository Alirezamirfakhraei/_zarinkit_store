<?php

namespace Botble\Behpardakht\Http\Requests;

use Botble\Support\Http\Requests\Request;

class BehpardakhtPaymentCallbackRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount'   => 'required|numeric',
            'currency' => 'required',
        ];
    }
}
