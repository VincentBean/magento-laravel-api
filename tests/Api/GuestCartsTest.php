<?php

namespace Grayloon\Magento\Tests;

use Grayloon\Magento\Api\GuestCarts;
use Grayloon\Magento\Magento;
use Illuminate\Support\Facades\Http;

class GuestCartsTest extends TestCase
{
    public function test_can_call_guest_carts()
    {
        $magento = new Magento();

        $this->assertInstanceOf(GuestCarts::class, $magento->api('guestCarts'));
    }

    public function test_can_call_guest_carts_create()
    {
        Http::fake();

        $magento = new Magento();

        $api = $magento->api('guestCarts')->create();

        $this->assertTrue($api->ok());
    }
}
