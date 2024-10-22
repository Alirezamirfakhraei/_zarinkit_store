<?php

Route::group(['namespace' => 'Botble\Zarinpal\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::get('payment/zarinpal/status', 'ZarinpalController@getCallback')->name('payments.zarinpal.status');
});
