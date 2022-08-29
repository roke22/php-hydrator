<?php

namespace Roke\ArrayToObjectFactory\Tests\TestClass\CompositeClass;

class Permission
{
    protected int $id;
    protected string $permission;

    public function __construct(int $id, string $permission)
    {
        $this->id = $id;
        $this->permission = $permission;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'permission' => $this->permission,
        ];
    }
}
