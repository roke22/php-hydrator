<?php
namespace Roke\ArrayToObjectFactory\Tests;

use PHPUnit\Framework\TestCase;
use Roke\ArrayToObjectFactory\ArrayToObject;
use Roke\ArrayToObjectFactory\Tests\TestClass\SimpleClass\SimpleClass;
use TypeError;

class SimpleClassTest extends TestCase
{
    public function testSimpleClassConstructOk()
    {
        $array = [
            'IdValue' => 1,
            'name_value' => 'Pepe',
            'Is_Active_Value' => false,
            'conversion_Value' => 2.85,
            'dataValue' => [
                'elemento_1' => 'one',
                'elemento_2' => 'two'
            ]
        ];

        //Result array with toArray method of the class
        $arrayResult = [
            'id' => 1,
            'name' => 'Pepe',
            'is_active' => false,
            'conversion' => 2.85,
            'data' => [
                'elemento_1' => 'one',
                'elemento_2' => 'two'
            ]
        ];

        $test = ArrayToObject::make($array, SimpleClass::class);
        $this->assertEquals($arrayResult, $test->toArray());
    }

    public function testSimpleClassConstructFail()
    {
        $this->expectException(TypeError::class);

        $array = [
            'Id' => 1,
            'name_value' => 'Pepe',
            'Is_Active_Value' => false,
            'conversion_Value' => 2.85,
            'dataValue' => [
                'elemento_1' => 'one',
                'elemento_2' => 'two'
            ]
        ];

        //Result array with toArray method of the class
        $arrayResult = [
            'id' => 1,
            'name' => 'Pepe',
            'is_active' => false,
            'conversion' => 2.85,
            'data' => [
                'elemento_1' => 'one',
                'elemento_2' => 'two'
            ]
        ];

        ArrayToObject::make($array, SimpleClass::class);
    }
}