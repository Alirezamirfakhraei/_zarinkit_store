@php
    Theme::layout('full-width');
@endphp

<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="padding_eight_all bg-white">
                                    <h3 class="mb-20">{{ __('Register') }}</h3>
                                    <p>{{ __('Please fill in the information below') }}</p>
                                </div>

                                <form method="POST" action="{{ route('customer.register.post') }}">
                                    @csrf
                                    <div class="form__content">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="txt-name" type="text" value="{{ old('name') }}" placeholder="{{ __('Your name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="txt-email" type="email" value="{{ old('email') }}" placeholder="{{ __('Your email address') }}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password" id="txt-password" placeholder="{{ __('Your password') }}">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password_confirmation" id="txt-password-confirmation" placeholder="{{ __('Password confirmation') }}">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>

                                        @if (is_plugin_active('marketplace'))
                                            <div class="show-if-vendor" @if (old('is_vendor') == 0) style="display: none" @endif>
                                                <div class="form-group">
                                                    <input class="form-control" name="shop_name" id="shop-name" type="text" value="{{ old('shop_name') }}" placeholder="{{ __('Shop Name') }}">
                                                    @if ($errors->has('shop_name'))
                                                        <span class="text-danger">{{ $errors->first('shop_name') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group shop-url-wrapper">
                                                    <span class="d-inline-block float-right shop-url-status"></span>
                                                    <input class="form-control" name="shop_url" id="shop-url" type="text" value="{{ old('shop_url') }}" placeholder="{{ __('Shop URL') }}" data-url="{{ route('public.ajax.check-store-url') }}">
                                                    @if ($errors->has('shop_url'))
                                                        <span class="text-danger">{{ $errors->first('shop_url') }}</span>
                                                    @endif
                                                    <span class="d-inline-block"><small data-base-url="{{ route('public.store', '') }}">{{ route('public.store', (string)old('shop_url')) }}</small></span>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" name="shop_phone" id="shop-phone" type="text" value="{{ old('shop_phone') }}" placeholder="{{ __('Shop phone') }}">
                                                    @if ($errors->has('shop_phone'))
                                                        <span class="text-danger">{{ $errors->first('shop_phone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
					@if (is_plugin_active('captcha') && setting('enable_captcha') && get_ecommerce_setting('enable_recaptcha_in_register_page', 0))
                                    <div class="form-group">
                                       {!! Captcha::display() !!}
                                    </div>
                                @endif

                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input type="hidden" name="agree_terms_and_policy" value="0">
                                                    <input class="form-check-input" type="checkbox" name="agree_terms_and_policy" id="agree-terms-and-policy" value="1" @if (old('agree_terms_and_policy') == 1) checked @endif>
                                                    <label class="form-check-label" for="agree-terms-and-policy"><span>{{ __('I agree to terms & Policy.') }}</span></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up">{{ __('Register') }}</button>
                                        </div>

                                        <br>
                                        <p>{{ __('Have an account already?') }} <a href="{{ route('customer.login') }}" class="d-inline-block">{{ __('Login') }}</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-30">
                        @if ($image = theme_option('image_in_login_page', theme_option('logo')))
                            <img class="border-radius-15" src="{{asset('storage/general/signup-vector.png')}}" alt="{{ theme_option('site_name') }}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
