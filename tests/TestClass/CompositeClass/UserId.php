<?php

namespace Roke\ArrayToObjectFactory\Tests\TestClass\CompositeClass;

class UserId
{
    protected int $id;
    protected string $email;
    protected string $phoneNumber;


    public function __construct(int $id, string $email, string $phoneNumber)
    {
        $this->id = $id;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getKey()
    {
        return $this->id."-".$this->email."-".$this->phoneNumber;
    }
}
