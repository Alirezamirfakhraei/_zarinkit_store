<?php

return [
    'menu' => 'ورود با شبکه ای اجتماعی',
    'settings' => [
        'description' => 'تنظیمات ورود با شبکه های اجتماعی',
        'enable' => 'فعال شود؟',
        'facebook' => [
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'description' => 'فعال/غیرفعال کردن و پیکربندی اعتبار برنامه برای ورود با فیس بوک',
            'helper' => 'لطفاً به https://developers.facebook.com برای ایجاد شناسه برنامه جدید به روز رسانی برنامه، App Secret بروید. URL برگشت به تماس عبارت است از: callback',
            'title' => 'تنظیمات ورود با فیس بوک',
        ],
        'github' => [
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'description' => 'فعال/غیرفعال کردن و پیکربندی اعتبار برنامه برای ورود به Github',
            'helper' => 'لطفاً به https://github.com/settings/developers برای ایجاد شناسه برنامه جدید به روز رسانی برنامه، App Secret بروید. URL برگشت به تماس عبارت است از: callback',
            'title' => 'تنظیمات ورود به سیستم با Github',
        ],
        'google' => [
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'description' => 'فعال/غیرفعال کردن و پیکربندی اعتبار برنامه برای ورود به سیستم Google',
            'helper' => 'لطفاً به https://console.developers.google.com/apis/dashboard برای ایجاد شناسه برنامه جدید به روز رسانی برنامه، App Secret بروید. URL برگشت به تماس عبارت است از: callback',
            'title' => 'تنظیمات ورود به سیستم با گوگل',
        ],
        'linkedin' => [
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'description' => 'فعال/غیرفعال کردن و پیکربندی اعتبار برنامه برای ورود به لینکدین',
            'helper' => 'لطفاً به https://www.linkedin.com/developers/apps/new برای ایجاد شناسه برنامه جدید به روز رسانی برنامه، App Secret مراجعه کنید. URL برگشت به تماس عبارت است از: callback',
            'title' => 'تنظیمات لاگین با لینکدین',
        ],
        'title' => 'تنظیمات ورود به سیستم با شبکه های اجتماعی',
    ],
];
