<?php

Route::group(['namespace' => 'Botble\Behpardakht\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::get('payment/behpardakht/status', 'BehpardakhtController@getCallback')->name('payments.behpardakht.status');
});
