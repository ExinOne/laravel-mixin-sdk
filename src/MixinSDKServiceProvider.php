<?php
/**
 * Created by PhpStorm.
 * User: kurisu
 * Date: 18-11-12
 * Time: 上午11:12
 */

namespace ExinOne\MixinSDK;

use Illuminate\Support\ServiceProvider;

class MixinSDKServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/publicConf.php' => config_path('mixin_sdk.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('laravel-mixin-network-sdk', function ($app) {
            return new MixinSDK(config('mixinSDK'));
        });
        $this->app->alias('laravel-mixin-network-sdk', MixinClient::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['laravel-mixin-network-sdk', MixinClient::class];
    }
}
