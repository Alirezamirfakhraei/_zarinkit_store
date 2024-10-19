@php $behpardakhtStatus = setting('payment_behpardakht_status'); @endphp
<table class="table payment-method-item">
    <tbody>
    <tr class="border-pay-row">
        <td class="border-pay-col"><i class="fa fa-theme-payments"></i></td>
        <td style="width: 20%;">
            <img class="filter-black" src="{{ url('vendor/core/plugins/behpardakht/images/behpardakht.svg') }}" alt="behpardakht">
        </td>
        <td class="border-right">
            <ul>
                <li>
                    <a href="https://Behpardakht.com" target="_blank">Behpardakht</a>
                    <p>{{ trans('plugins/payment::payment.behpardakht_description') }}</p>
                </li>
            </ul>
        </td>
    </tr>
    <tr class="bg-white">
        <td colspan="3">
            <div class="float-start" style="margin-top: 5px;">
                <div class="payment-name-label-group  @if ($behpardakhtStatus== 0) hidden @endif">
                    <span class="payment-note v-a-t">{{ trans('plugins/payment::payment.use') }}:</span> <label class="ws-nm inline-display method-name-label">{{ setting('payment_behpardakht_name') }}</label>
                </div>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary toggle-payment-item edit-payment-item-btn-trigger @if ($behpardakhtStatus == 0) hidden @endif">{{ trans('plugins/payment::payment.edit') }}</a>
                <a class="btn btn-secondary toggle-payment-item save-payment-item-btn-trigger @if ($behpardakhtStatus == 1) hidden @endif">{{ trans('plugins/payment::payment.settings') }}</a>
            </div>
        </td>
    </tr>
    <tr class="paypal-online-payment payment-content-item hidden">
        <td class="border-left" colspan="3">
            {!! Form::open() !!}
            {!! Form::hidden('type', BEHPARDAKHT_PAYMENT_METHOD_NAME, ['class' => 'payment_type']) !!}
            <div class="row">
                <div class="col-sm-6">
                    <ul>
                        <li>
                            <label>{{ trans('plugins/payment::payment.configuration_instruction', ['name' => 'Behpardakht']) }}</label>
                        </li>
                        <li class="payment-note">
                            <p>{{ trans('plugins/payment::payment.configuration_requirement', ['name' => 'Behpardakht']) }}:</p>
                            <ul class="m-md-l" style="list-style-type:decimal">
                                <li style="list-style-type:decimal">
                                    <a href="https://my.behpardakht.com/" target="_blank">
                                        {{ trans('plugins/payment::payment.service_registration', ['name' => 'Behpardakht']) }}
                                    </a>
                                </li>
                                <li style="list-style-type:decimal">
                                    <p>{{ trans('plugins/payment::payment.after_service_registration_msg', ['name' => 'Behpardakht']) }}</p>
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
                            <label class="text-title-field" for="behpardakht_name">{{ trans('plugins/payment::payment.method_name') }}</label>
                            <input type="text" class="next-input input-name" name="payment_behpardakht_name" id="behpardakht_name" data-counter="400" value="{{ setting('payment_behpardakht_name', trans('plugins/payment::payment.pay_online_via', ['name' => 'Behpardakht'])) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="payment_behpardakht_description">{{ trans('core/base::forms.description') }}</label>
                            <textarea class="next-input" name="payment_behpardakht_description" id="payment_behpardakht_description">{{ get_payment_setting('description', 'paypal', __('You will be redirected to Behpardakht to complete the payment.')) }}</textarea>
                        </div>
                        <p class="payment-note">
                            {{ trans('plugins/payment::payment.please_provide_information') }} <a target="_blank" href="//www.behpardakht.com">Behpardakht</a>:
                        </p>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="behpardakht_terminalId">{{ trans('plugins/payment::payment.terminalId') }}</label>
                            <input type="text" class="next-input" name="payment_behpardakht_terminalId" id="behpardakht_terminalId" value="{{ app()->environment('demo') ? '*******************************' :setting('payment_behpardakht_terminalId') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="behpardakht_username">{{ trans('plugins/payment::payment.username') }}</label>
                            <div class="input-option">
                                <input type="password" class="next-input" placeholder="••••••••" id="behpardakht_username" name="payment_behpardakht_username" value="{{ app()->environment('demo') ? '*******************************' : setting('payment_behpardakht_username') }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="behpardakht_password">{{ trans('plugins/payment::payment.password') }}</label>
                            <div class="input-option">
                                <input type="password" class="next-input" placeholder="••••••••" id="behpardakht_password" name="payment_behpardakht_username" value="{{ app()->environment('demo') ? '*******************************' : setting('payment_behpardakht_password') }}">
                            </div>
                        </div>
                        {!! Form::hidden('payment_behpardakht_mode', 1) !!}

                        {!! apply_filters(PAYMENT_METHOD_SETTINGS_CONTENT, null, 'behpardakht') !!}
                    </div>
                </div>
            </div>
            <div class="col-12 bg-white text-end">
                <button class="btn btn-warning disable-payment-item @if ($behpardakhtStatus == 0) hidden @endif" type="button">{{ trans('plugins/payment::payment.deactivate') }}</button>
                <button class="btn btn-info save-payment-item btn-text-trigger-save @if ($behpardakhtStatus == 1) hidden @endif" type="button">{{ trans('plugins/payment::payment.activate') }}</button>
                <button class="btn btn-info save-payment-item btn-text-trigger-update @if ($behpardakhtStatus == 0) hidden @endif" type="button">{{ trans('plugins/payment::payment.update') }}</button>
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    </tbody>
</table>
