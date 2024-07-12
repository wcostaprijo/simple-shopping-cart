<?php

namespace Domain\Payment;

use Application\PaymentMethod;

class Pix implements PaymentMethod
{
    private float $discount = 0.10; // Desconto de 10% em pagamento a vista

    public function calculateTotal(float $amount): float
    {
        return $amount * (1 - $this->discount);
    }
}
