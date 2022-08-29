<?php

namespace Roke\ArrayToObjectFactory\Tests;

use PHPUnit\Framework\TestCase;
use Roke\ArrayToObjectFactory\ArrayToObject;
use Roke\ArrayToObjectFactory\Tests\TestClass\CompositeClass\User;
use TypeError;

class CompositeClassTest extends TestCase
{
    public function testCompositeClassOk()
    {
        $array = [
            'Id' => 1,
            'name' => 'Pepe',
            'first_name' => 'Martinez',
            'email' => 'pepe@martinez.es',
            'phone_number' => '123456789',
            'array' => [
                'elemento1' => 'uno',
                'elemento2' => 'dos'
            ],
            'roles' => [
                'id' => 11,
                'rol_name' => 'Administrator22',
                'Permissions' => [
                    [
                        'id' => 22,
                        'Permission' => 'Editar Usuarios'
                    ],
                    [
                        'id' => 33,
                        'Permission' => 'Borrar Usuarios'
                    ]
                ]
            ]
        ];

        //Result array with toArray method of the class
        $arrayResult = [
            'id' => 1,
            'name' => 'Pepe',
            'first_name' => 'Martinez',
            'email' => 'pepe@martinez.es',
            'phone_number' => '123456789',
            'array' => [
                'elemento1' => 'uno',
                'elemento2' => 'dos'
            ],
            'roles' => [
                'id' => 11,
                'rol_name' => 'Administrator22',
                'permissions' => [
                    [
                        'id' => 22,
                        'permission' => 'Editar Usuarios'
                    ],
                    [
                        'id' => 33,
                        'permission' => 'Borrar Usuarios'
                    ]
                ]
                    ],
            'userId' => '1-pepe@martinez.es-123456789'
        ];

        $test = ArrayToObject::make($array, User::class);
        $this->assertEquals($arrayResult, $test->toArray());
    }

    public function testCompositeClassFail()
    {
        $this->expectException(TypeError::class);

        $array = [
            'Id' => 1,
            'name' => 'Pepe',
            'first_name' => 'Martinez',
            'email' => 'pepe@martinez.es',
            'phone_number' => '123456789',
            'array' => [
                'elemento1' => 'uno',
                'elemento2' => 'dos'
            ],
            'roles' => [
                'id' => 11,
                'rol_name' => 'Administrator22',
                'Permissions' => [
                    [
                        'id' => 22,
                        'wrongIndexToCheckException' => 'Editar Usuarios'
                    ],
                    [
                        'id' => 33,
                        'Permission' => 'Borrar Usuarios'
                    ]
                ]
            ]
        ];

        $test = ArrayToObject::make($array, User::class);
    }
}
