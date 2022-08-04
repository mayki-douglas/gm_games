<?php

namespace APP\Model;

class Client
{
    private int $id;
    private string $cpf;
    private string $name;
    private string $phone;

    public function __construct(
        int $id = 0,
        string $cpf,
        string $name,
        string $phone,
    ) {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->phone = $phone;
    }
}