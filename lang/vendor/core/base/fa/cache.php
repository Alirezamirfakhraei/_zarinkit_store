<?php

return [
    'cache_commands' => 'دستورات کش را پاک کنید',
    'cache_management' => 'مدیریت کش',
    'commands' => [
        'clear_cms_cache' => [
            'description' => 'پاک کردن حافظه پنهان CMS: کش پایگاه داده، بلوک های ایستا... زمانی که تغییرات پس از به روز رسانی داده ها را مشاهده نکردید، این دستور را اجرا کنید.',
            'success_msg' => 'کش پاک شد',
            'title' => 'تمام کش CMS را پاک کنید',
        ],
        'clear_config_cache' => [
            'description' => 'هنگامی که چیزی را در محیط تولید تغییر می‌دهید، ممکن است لازم باشد حافظه پنهان پیکربندی را به‌روزرسانی کنید.',
            'success_msg' => 'کش پیکربندی پاک شد',
            'title' => 'کش پیکربندی را پاک کنید',
        ],
        'clear_log' => [
            'description' => 'فایل های گزارش سیستم را پاک کنید',
            'success_msg' => 'گزارش سیستم پاک شده است',
            'title' => 'پاک کردن گزارش',
        ],
        'clear_route_cache' => [
            'description' => 'کش مسیریابی را پاک کنید.',
            'success_msg' => 'کش مسیر پاک شده است',
            'title' => 'کش مسیر را پاک کنید',
        ],
        'refresh_compiled_views' => [
            'description' => 'نماهای کامپایل شده را پاک کنید تا نماها به روز شوند.',
            'success_msg' => 'نمای کش به روز شد',
            'title' => 'بازخوانی نماهای کامپایل شده',
        ],
    ],
];
