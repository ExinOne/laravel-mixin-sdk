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
use Tests\TestCase;

class NetworkApiTest extends TestCase
{
    public function test_it_can_read_user_success0()
    {
        $userInfo = MixinSDK::network()->readUser('36d51948-4a0d-400a-80de-f71070e374c0');
        self::assertFalse(false);
    }

    public function test_it_can_read_users_success0()
    {
        $userUuids = [
            '36d51948-4a0d-400a-80de-f71070e374c0',
            '17d1c125-aada-46b0-897d-3cb2a29eb011',
        ];
        $userInfos = MixinSDK::network()->readUsers($userUuids);

        self::assertInternalType('array', $userInfos);
        foreach ($userInfos as $item) {
            self::assertInternalType('array', $item);
        }
    }

    public function test_it_can_search_user_success0()
    {
        $searchInfo = [
            7000101528,
        ];

        foreach ($searchInfo as $item) {
            $userInfo = MixinSDK::network()->searchUser($item);
            dump($userInfo);
            self::assertInternalType('array', $userInfo);
        }
    }

    public function test_it_can_read_network_success0()
    {
        $networkInfo = MixinSDK::network()->readNetwork();
        self::assertInternalType('array', $networkInfo);
    }

    public function test_it_can_read_network_asset_success0()
    {
        $assetIds = [
            'c6d0c728-2624-429b-8e0d-d9d19b6592fa',
            '43d61dcd-e413-450d-80b8-101d5e903357',
        ];

        foreach ($assetIds as $assetId) {
            $assetInfo = MixinSDK::network()->readNetworkAsset($assetId);
            self::assertInternalType('array', $assetInfo);
        }
    }

    public function test_it_can_read_network_snapshots_success0()
    {

        $limit   = 2;
        $offset  = '2018-11-27T09:58:25.362528Z';
        $assetId = 'c6d0c728-2624-429b-8e0d-d9d19b6592fa';
        $order   = 'ASC';

        $networkInfo0 = MixinSDK::network()->readNetworkSnapshots($limit);
        self::assertInternalType('array', $networkInfo0);
        self::assertCount(2, $networkInfo0);

        $networkInfo1 = MixinSDK::network()->readNetworkSnapshots($limit, $offset);
        self::assertInternalType('array', $networkInfo1);
        self::assertCount(2, $networkInfo1);

        $networkInfo2 = MixinSDK::network()->readNetworkSnapshots($limit, $offset, $assetId);
        foreach ($networkInfo2 as $networkInfo) {
            self::assertEquals($assetId, $networkInfo['asset']['asset_id']);
        }
        self::assertInternalType('array', $networkInfo2);
        self::assertCount(2, $networkInfo2);

        $networkInfo3 = MixinSDK::network()->readNetworkSnapshots($limit, $offset, $assetId, $order);
        foreach ($networkInfo3 as $networkInfo) {
            self::assertEquals($assetId, $networkInfo['asset']['asset_id']);
        }
        self::assertInternalType('array', $networkInfo3);
        self::assertCount(2, $networkInfo3);

        $networkInfo4 = MixinSDK::network()->readNetworkSnapshots($limit, null, $assetId, $order);
        foreach ($networkInfo4 as $networkInfo) {
            self::assertEquals($assetId, $networkInfo['asset']['asset_id']);
        }
        self::assertInternalType('array', $networkInfo4);
        self::assertCount(2, $networkInfo4);

        $networkInfo5 = MixinSDK::network()->readNetworkSnapshots(null, $offset, $assetId);
        foreach ($networkInfo5 as $networkInfo) {
            self::assertEquals($assetId, $networkInfo['asset']['asset_id']);
        }
        self::assertInternalType('array', $networkInfo5);
    }

    public function test_it_can_read_network_snapshot_success0()
    {
        $arr = [
            '520118d0-e8d2-41c1-9066-9f499228aa31',
            '1167ccbf-4e7e-4265-8e99-d5a39b2e2cf8',
        ];
        foreach ($arr as $snapshotId) {
            $snapshotInfo = MixinSDK::network()->readNetworkSnapshot($snapshotId);
            self::assertEquals($snapshotId, $snapshotInfo['snapshot_id']);
        }
    }

    public function test_it_can_create_user_success0()
    {
        $name = 'balaslslsdfjkl';
        $res  = MixinSDK::network()->createUser($name);
        self::assertEquals($name, $res['full_name']);
        self::assertArrayHasKey('priKey', $res);
        self::assertArrayHasKey('pubKey', $res);
    }

    public function test_it_can_read_external_transaction_success0()
    {
        //TODO
    }

    public function test_it_can_create_attachments_success0()
    {
        $res = MixinSDK::network()->createAttachments();
        self::assertArrayHasKey('upload_url', $res);
        self::assertArrayHasKey('view_url', $res);
        self::assertNotEmpty($res['upload_url']);
        self::assertNotEmpty($res['view_url']);
    }

    public function test_it_can_read_mixin_network_chains_sync_status_success0()
    {
        $res = MixinSDK::network()->mixinNetworkChainsSyncStatus();
        self::assertArrayHasKey('chains', $res);
    }

    public function test_it_can_read_top_asset_success0()
    {
        $res = MixinSDK::network()->topAsset();
        self::assertArrayHasKey('chains', $res);
    }
}
