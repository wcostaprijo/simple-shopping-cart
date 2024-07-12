<?php

namespace Application;

class PaymentProcessor
{
    public function __construct(private PaymentMethod $paymentMethod)
    { }

    public function process(float $amount): float
    {
        return $this->paymentMethod->calculateTotal($amount);
    }
}
