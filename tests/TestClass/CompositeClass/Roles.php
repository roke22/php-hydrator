<?php

namespace Roke\ArrayToObjectFactory\Tests\TestClass\CompositeClass;

class Roles
{
    protected int $id;
    protected string $rolName;
    protected Permissions $permissions;

    public function __construct(int $id, string $rolName, Permissions $permissions)
    {
        $this->id = $id;
        $this->rolName = $rolName;
        $this->permissions = $permissions;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'rol_name' => $this->rolName,
            'permissions' => $this->permissions->toArray()
        ];
    }
}
