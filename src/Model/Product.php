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
        string $name,
        float $price,
        int $quantity,
        string $platform,
        int $id=0
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->platform = $platform;
        $this->id = $id;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
}
