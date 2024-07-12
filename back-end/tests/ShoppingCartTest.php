<?php

use PHPUnit\Framework\TestCase;
use Domain\Item;
use Domain\Cart;
use Domain\Payment\Pix;
use Domain\Payment\CreditCard;
use Application\PaymentProcessor;

class ShoppingCartTest extends TestCase
{
    public function testCartTotal()
    {
        $item1 = new Item("Camiseta Gola V", 89.90, 2);
        $item2 = new Item("Calça Jeans", 100, 1);

        $cart = new Cart();
        $cart->addItem($item1);
        $cart->addItem($item2);

        $this->assertEquals(279.8, $cart->getTotal());
    }

    public function testPixPayment()
    {
        $amount = 250;
        $pixPayment = new Pix();
        $paymentProcessor = new PaymentProcessor($pixPayment);

        $this->assertEquals(225, $paymentProcessor->process($amount));
    }

    public function testCreditCardWithInstallmentsPayment()
    {
        $amount = 250;
        $creditCardPayment = new CreditCard(3);
        $paymentProcessor = new PaymentProcessor($creditCardPayment);

        $this->assertEquals(257.58, $paymentProcessor->process($amount));
    }

    public function testCreditCardWithoutInstallmentsPayment()
    {
        $amount = 250;
        $creditCardPayment = new CreditCard(1);
        $paymentProcessor = new PaymentProcessor($creditCardPayment);

        $this->assertEquals(225, $paymentProcessor->process($amount));
    }
}
