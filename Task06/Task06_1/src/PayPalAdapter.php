<?php

class PayPalAdapter implements PaymentAdapterInterface {
    private $payPal;

    public function __construct(PayPal $payPal) {
        $this->payPal = $payPal;
    }

    public function collectMoney($amount) {
        $result = $this->payPal->authorizeTransaction($amount);
        return $result === "PayPal успешный тест!";
    }
}