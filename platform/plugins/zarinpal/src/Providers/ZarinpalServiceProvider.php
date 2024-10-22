<?php

namespace Botble\Zarinpal\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Support\ServiceProvider;

class ZarinpalServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot()
    {
        if (is_plugin_active('payment')) {
            $this->setNamespace('plugins/zarinpal')
                ->loadHelpers()
                ->loadRoutes(['web'])
                ->loadAndPublishViews()
                ->publishAssets();

            $this->app->register(HookServiceProvider::class);
        }
    }
}
