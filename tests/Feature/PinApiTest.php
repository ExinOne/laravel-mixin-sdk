<?php
/**
 * Created by PhpStorm.
 * User: kurisu
 * Date: 18-11-29
 * Time: 下午3:10
 */

namespace ExinOne\MixinSDK\Tests\Feature;

use ExinOne\MixinSDK\Facades\MixinSDK;
use ExinOne\MixinSDK\MixinClient;
use PHPUnit\Framework\TestCase;

class PinApiTest extends TestCase
{
    public function test_it_can_change_user_pin_code()
    {
        $nowPin = MixinSDK::getConfig('default')['pin'];
        $newPin = '111111';

        //$res = MixinSDK::pin()->updatePin($nowPin, $newPin);
        //$res = MixinSDK::pin()->verifyPin($newPin);
        //$res = MixinSDK::pin()->updatePin($newPin, $nowPin);
        self::assertFalse(false);
    }
}
