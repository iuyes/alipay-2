<?php namespace Alipay;

class UtilsTest extends \PHPUnit_Framework_TestCase {

    public function testGatewayUrl()
    {
        $gateway_url = 'https://www.alipay.com/cooperate/gateway.do?';
        $this->assertEquals(gateway_url(), $gateway_url);
    }

    public function testNotifyUrl()
    {
        $notify_url = 'https://mapi.alipay.com/gateway.do?service=notify_verify&partner=cGlk&notify_id=bm90aWZ5X2lk';
        $this->assertEquals(notify_url('cGlk', 'bm90aWZ5X2lk'), $notify_url);
    }

    public function testMixinSort()
    {

    }

    public function testGenerateBatchNumber()
    {
        $this->assertRegExp('/[0-9]{24}/', generate_batch_number());
    }
}
