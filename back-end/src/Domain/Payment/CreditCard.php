<?php

namespace Domain\Payment;

use Application\PaymentMethod;

class CreditCard implements PaymentMethod
{
    private float $interestRate = 0.01; // Taxa de 1% ao mês para parcelamento

    private float $discount = 0.10; // Desconto de 10% em pagamento a vista

    public function __construct(private int $installments)
    {
        if ($installments < 1 || $installments > 12) {
            throw new \InvalidArgumentException("Invalid number of installments.");
        }

        $this->installments = $installments;
    }

    public function calculateTotal(float $amount): float
    {
        if ($this->installments == 1) {
            return $amount * (1 - $this->discount);
        }

        return round($amount * pow((1 + $this->interestRate), $this->installments), 2);
    }
}
