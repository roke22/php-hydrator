<?php

namespace Roke\ArrayToObjectFactory\Tests\TestClass\CompositeClass;

class User
{
    protected UserId $userId;
    protected int $id;
    protected string $name;
    protected string $firstName;
    protected string $email;
    protected string $phoneNumber;
    protected array $array;
    protected Roles $roles;

    public function __construct(int $id, string $name, string $firstName, string $email, string $phoneNumber, array $array, Roles $roles)
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->array = $array;
        $this->roles = $roles;
        $this->userId = new UserId($id, $email, $phoneNumber);
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'first_name' => $this->firstName,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'array' => $this->array,
            'roles' => $this->roles->toArray(),
            'userId' => $this->userId->getKey()
        ];
    }
}
