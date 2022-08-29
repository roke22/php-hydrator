<?php
namespace Roke\ArrayToObjectFactory\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Roke\ArrayToObjectFactory\ArrayToObject;
use Roke\ArrayToObjectFactory\Tests\TestClass\SimpleCollection\Permissions;
use Roke\ArrayToObjectFactory\Tests\TestClass\SimpleCollectionWithWrongClass\Permissions as WrongPermissions;


class SimpleCollectionTest extends TestCase
{
    public function testSimpleCollectionConstructOk()
    {
        $array = [
            [
                'Id' => 1,
                'Permission' => 'Lorem Ipsum'
            ],
            [
                'Id' => 2,
                'permission' => 'Lorem Ipsum'
            ],
            [
                'id' => 3,
                'Permission' => 'Lorem Ipsum'
            ]
        ];

        //Result array with toArray method of the class
        $arrayResult = [
            0 => [
                'id' => 1,
                'permission' => 'Lorem Ipsum'
            ],
            1 => [
                'id' => 2,
                'permission' => 'Lorem Ipsum'
            ],
            2 => [
                'id' => 3,
                'permission' => 'Lorem Ipsum'
            ]
        ];

        $test = ArrayToObject::make($array, Permissions::class);
        $this->assertEquals($arrayResult, $test->toArray());
    }

    public function testSimpleCollectionConstructFail()
    {
        $this->expectException(InvalidArgumentException::class);

        $array = [
            [
                'Id' => 1,
                'Permission' => 'Lorem Ipsum'
            ],
            [
                'Id' => 2,
                'permission' => 'Lorem Ipsum'
            ],
            [
                'id' => 3,
                'Permission' => 'Lorem Ipsum'
            ]
        ];

        ArrayToObject::make($array, WrongPermissions::class);
    }
}