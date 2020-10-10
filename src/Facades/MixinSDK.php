<?php
/**
 * Created by PhpStorm.
 * User: kurisu
 * Date: 18-11-12
 * Time: 下午12:20
 */

namespace ExinOne\MixinSDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \ExinOne\MixinSDK\Container user()
 * @method static \ExinOne\MixinSDK\Container pin()
 * @method static \ExinOne\MixinSDK\Container network()
 * @method static \ExinOne\MixinSDK\Container wallet()
 * @method static get()
 * @method static array getConfig(string $name = '')
 * @method static \ExinOne\MixinSDK\MixinSDK setConfig(string $name, array $config)
 * @method static \ExinOne\MixinSDK\MixinSDK use (string $name, array $config = [])
 * @method static string getOauthUrl (string $client_id, string $scope)
 *
 * @see \ExinOne\MixinSDK\MixinSDK
 */
class MixinSDK extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-mixin-network-sdk';
    }
}
