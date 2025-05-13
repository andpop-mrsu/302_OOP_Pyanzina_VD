<?php

use PHPUnit\Framework\TestCase;

class PayPalAdapterTest extends TestCase {
    public function testCollectMoneySuccess() {
        $payPalMock = $this->createMock(PayPal::class);
        $payPalMock->method('authorizeTransaction')->willReturn("PayPal успешный тест!");
        $adapter = new PayPalAdapter($payPalMock);
        $this->assertTrue($adapter->collectMoney(100));
    }

    public function testCollectMoneyFailure() {
        $payPalMock = $this->createMock(PayPal::class);
        $payPalMock->method('authorizeTransaction')->willReturn("PayPal ошибка!");
        $adapter = new PayPalAdapter($payPalMock);
        $this->assertFalse($adapter->collectMoney(100));
    }
}