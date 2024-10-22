<?php

return [
    'name' => 'خبرنامه ها',
    'settings' => [
        'description' => 'تنظیمات خبرنامه',
        'email' => [
            'templates' => [
                'description' => 'پیکربندی قالب های ایمیل خبرنامه',
                'title' => 'خبرنامه',
                'to_admin' => [
                    'description' => 'قالب برای ارسال ایمیل به ادمین',
                    'title' => 'ارسال ایمیل به ادمین',
                ],
                'to_user' => [
                    'description' => 'الگوی ارسال ایمیل به مشترک',
                    'title' => 'ارسال ایمیل به کاربر',
                ],
            ],
        ],
        'mailchimp_api_key' => 'Mailchimp API Key',
        'mailchimp_list' => 'لیست Mailchimp',
        'mailchimp_list_id' => 'شناسه فهرست Mailchimp',
        'sendgrid_api_key' => 'کلید Sendgrid API',
        'sendgrid_list' => 'لیست Sendgrid',
        'sendgrid_list_id' => 'شناسه لیست Sendgrid',
        'title' => 'خبرنامه',
    ],
    'statuses' => [
        'subscribed' => 'مشترک شده ها',
        'unsubscribed' => 'لغو اشتراک ها',
    ],
];
