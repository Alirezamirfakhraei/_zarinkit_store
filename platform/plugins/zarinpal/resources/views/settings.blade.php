@php $zarinpalStatus = setting('payment_zarinpal_status'); @endphp
<table class="table payment-method-item">
    <tbody>
    <tr class="border-pay-row">
        <td class="border-pay-col"><i class="fa fa-theme-payments"></i></td>
        <td style="width: 20%;">
            <img class="filter-black" src="{{ url('vendor/core/plugins/zarinpal/images/zarinpal.svg') }}" alt="zarinpal">
        </td>
        <td class="border-right">
            <ul>
                <li>
                    <a href="https://Behpardakht.com" target="_blank">zarinpal</a>
                    <p>{{ trans('plugins/payment::payment.zarinpal_description') }}</p>
                </li>
            </ul>
        </td>
    </tr>
    <tr class="bg-white">
        <td colspan="3">
            <div class="float-start" style="margin-top: 5px;">
                <div class="payment-name-label-group  @if ($zarinpalStatus== 0) hidden @endif">
                    <span class="payment-note v-a-t">{{ trans('plugins/payment::payment.use') }}:</span> <label class="ws-nm inline-display method-name-label">{{ setting('payment_zarinpal_name') }}</label>
                </div>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary toggle-payment-item edit-payment-item-btn-trigger @if ($zarinpalStatus == 0) hidden @endif">{{ trans('plugins/payment::payment.edit') }}</a>
                <a class="btn btn-secondary toggle-payment-item save-payment-item-btn-trigger @if ($zarinpalStatus == 1) hidden @endif">{{ trans('plugins/payment::payment.settings') }}</a>
            </div>
        </td>
    </tr>
    <tr class="paypal-online-payment payment-content-item hidden">
        <td class="border-left" colspan="3">
            {!! Form::open() !!}
            {!! Form::hidden('type', ZARINPAL_PAYMENT_METHOD_NAME, ['class' => 'payment_type']) !!}
            <div class="row">
                <div class="col-sm-6">
                    <ul>
                        <li>
                            <label>{{ trans('plugins/payment::payment.configuration_instruction', ['name' => 'Zarinpal']) }}</label>
                        </li>
                        <li class="payment-note">
                            <p>{{ trans('plugins/payment::payment.configuration_requirement', ['name' => 'Zarinpal']) }}:</p>
                            <ul class="m-md-l" style="list-style-type:decimal">
                                <li style="list-style-type:decimal">
                                    <a href="https://zarinpal.com" target="_blank">
                                        {{ trans('plugins/payment::payment.service_registration', ['name' => 'Zarinpal']) }}
                                    </a>
                                </li>
                                <li style="list-style-type:decimal">
                                    <p>{{ trans('plugins/payment::payment.after_service_registration_msg', ['name' => 'Zarinpal']) }}</p>
                                </li>
                                <li style="list-style-type:decimal">
                                    <p>{{ trans('plugins/payment::payment.enter_client_id_and_secret') }}</p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <div class="well bg-white">
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="zarinpal_name">{{ trans('plugins/payment::payment.method_name') }}</label>
                            <input type="text" class="next-input input-name" name="payment_zarinpal_name" id="zarinpal_name" data-counter="400" value="{{ setting('payment_zarinpal_name', trans('plugins/payment::payment.pay_online_via', ['name' => 'Zarinpal'])) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="payment_zarinpal_description">{{ trans('core/base::forms.description') }}</label>
                            <textarea class="next-input" name="payment_zarinpal_description" id="payment_zarinpal_description">{{ setting('payment_zarinpal_description', 'zarinpal', __('You will be redirected to zarinpal to complete the payment.')) }}</textarea>
                        </div>
                        <p class="payment-note">
                            {{ trans('plugins/payment::payment.please_provide_information') }} <a target="_blank" href="//www.Zarinpal.com">Zarinpal</a>:
                        </p>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="zarinpal_merchantId">{{ trans('plugins/payment::payment.merchantId') }}</label>
                            <div class="input-option">
                                <input type="text" class="next-input" placeholder="••••••••" id="zarinpal_merchantId" name="payment_zarinpal_merchantId" value="{{ app()->environment('demo') ? '*******************************' : setting('payment_zarinpal_merchantId') }}">
                            </div>
                        </div>
                        {!! Form::hidden('payment_zarinpal_mode', 1) !!}
                        <div class="form-group mb-3">
                            <label class="next-label">
                                <input type="checkbox"  value="0" name="payment_zarinpal_mode" @if (setting('payment_zarinpal_mode') == 0) checked @endif>
                                {{ trans('plugins/payment::payment.sandbox_mode') }}
                            </label>
                        </div>
                        {!! apply_filters(PAYMENT_METHOD_SETTINGS_CONTENT, null, 'zarinpal') !!}
                    </div>
                </div>
            </div>
            <div class="col-12 bg-white text-end">
                <button class="btn btn-warning disable-payment-item @if ($zarinpalStatus == 0) hidden @endif" type="button">{{ trans('plugins/payment::payment.deactivate') }}</button>
                <button class="btn btn-info save-payment-item btn-text-trigger-save @if ($zarinpalStatus == 1) hidden @endif" type="button">{{ trans('plugins/payment::payment.activate') }}</button>
                <button class="btn btn-info save-payment-item btn-text-trigger-update @if ($zarinpalStatus == 0) hidden @endif" type="button">{{ trans('plugins/payment::payment.update') }}</button>
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    </tbody>
</table>
