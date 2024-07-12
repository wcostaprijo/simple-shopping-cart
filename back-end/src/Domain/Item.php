<?php

namespace Domain;

class Item
{
    public function __construct(private string $name, private float $price, private int $quantity)
    { }

    public function getTotal(): float
    {
        return $this->price * $this->quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
