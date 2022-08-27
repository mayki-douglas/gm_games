<?php

namespace APP\Model;

class Client
{
    private int $id;
    private string $user;
    private string $password;
    private string $cpf;
    private string $name;
    private string $phone;

    public function __construct(
        string $user,
        string $password,
        string $cpf,
        string $name,
        string $phone,
        int $id=0
    ) {
        $this->user = $user;
        $this->password = $password;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->phone = $phone;
        $this->id = $id;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
}