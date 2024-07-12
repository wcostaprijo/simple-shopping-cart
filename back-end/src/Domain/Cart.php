<?php

namespace Domain;

class Cart
{
    private array $items = [];

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function getTotal(): float
    {
        return array_reduce($this->items, fn ($sum, Item $item) =>  $sum + $item->getTotal(), 0);
    }
}
