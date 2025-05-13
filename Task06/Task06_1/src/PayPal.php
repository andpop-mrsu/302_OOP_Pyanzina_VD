<?php

interface PayPal {
    public function authorizeTransaction($amount): string;
}
