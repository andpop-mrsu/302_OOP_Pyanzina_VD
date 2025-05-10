<?php

class CreditCardAdapter implements PaymentAdapterInterface {
    private $creditCard;

    public function __construct(CreditCard $creditCard) {
        $this->creditCard = $creditCard;
    }

    public function collectMoney($amount) {
        $result = $this->creditCard->transfer($amount);
        return strpos($result, "Код:") !== false;
    }
}