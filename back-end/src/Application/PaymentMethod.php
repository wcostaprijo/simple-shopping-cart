<?php

namespace Application;

interface PaymentMethod
{
    public function calculateTotal(float $amount): float;
}
