<?php

namespace Grayloon\Magento\Tests;

use Grayloon\Magento\Api\Carts;
use Grayloon\Magento\Magento;
use Illuminate\Support\Facades\Http;

class CartsTest extends TestCase
{
    public function test_can_call_carts()
    {
        $magento = new Magento();

        $this->assertInstanceOf(Carts::class, $magento->api('carts'));
    }

    public function test_can_call_carts_mine()
    {
        Http::fake();

        $magento = new Magento();
        $magento->storeCode = 'default';

        $api = $magento->api('carts')->mine();

        $this->assertTrue($api->ok());
    }

    public function test_must_pass_a_single_store_code_to_carts_mine()
    {
        $this->expectException('exception');

        $magento = new Magento();
        $magento->api('carts')->mine();
    }

    public function test_can_call_carts_estimate_shipping_methods()
    {
        Http::fake([
            '*rest/default/V1/carts/mine/estimate-shipping-methods' => Http::response([], 200),
        ]);

        $magento = new Magento();
        $magento->storeCode = 'default';

        $api = $magento->api('carts')->estimateShippingMethods([]);

        $this->assertTrue($api->ok());
    }

    public function test_must_pass_a_single_store_code_to_estimate_shipping_methods()
    {
        $this->expectException('exception');

        $magento = new Magento();
        $magento->api('carts')->estimateShippingMethods([]);
    }

    public function test_can_call_carts_totals_information()
    {
        Http::fake([
            '*rest/default/V1/carts/mine/totals-information' => Http::response([], 200),
        ]);

        $magento = new Magento();
        $magento->storeCode = 'default';

        $api = $magento->api('carts')->totalsInformation([]);

        $this->assertTrue($api->ok());
    }

    public function test_must_pass_a_single_store_code_to_totals_information()
    {
        $this->expectException('exception');

        $magento = new Magento();
        $magento->api('carts')->totalsInformation([]);
    }

    public function test_can_call_carts_shipping_information()
    {
        Http::fake([
            '*rest/default/V1/carts/mine/shipping-information' => Http::response([], 200),
        ]);

        $magento = new Magento();
        $magento->storeCode = 'default';

        $api = $magento->api('carts')->shippingInformation([]);

        $this->assertTrue($api->ok());
    }

    public function test_must_pass_a_single_store_code_to_shipping_information()
    {
        $this->expectException('exception');

        $magento = new Magento();
        $magento->api('carts')->shippingInformation([]);
    }

    public function test_can_call_carts_payment_methods()
    {
        Http::fake([
            '*rest/default/V1/carts/mine/payment-methods' => Http::response([], 200),
        ]);

        $magento = new Magento();
        $magento->storeCode = 'default';

        $api = $magento->api('carts')->paymentMethods([]);

        $this->assertTrue($api->ok());
    }

    public function test_must_pass_a_single_store_code_to_payment_methods()
    {
        $this->expectException('exception');

        $magento = new Magento();
        $magento->api('carts')->paymentMethods([]);
    }

    public function test_can_call_carts_payment_information()
    {
        Http::fake([
            '*rest/default/V1/carts/mine/payment-information' => Http::response([], 200),
        ]);

        $magento = new Magento();
        $magento->storeCode = 'default';

        $api = $magento->api('carts')->paymentInformation([]);

        $this->assertTrue($api->ok());
    }

    public function test_must_pass_a_single_store_code_to_payment_information()
    {
        $this->expectException('exception');

        $magento = new Magento();
        $magento->api('carts')->paymentInformation([]);
    }
}
