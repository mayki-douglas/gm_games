<?php

namespace APP\Model;

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private int $quantity;
    private string $platform;

    public function __construct(
        int $id = 0,
        string $name,
        float $price,
        int $quantity,
        string $platform,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->platform = $platform;
    }
}
