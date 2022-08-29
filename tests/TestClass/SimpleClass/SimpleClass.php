<?php

namespace Roke\ArrayToObjectFactory\Tests\TestClass\SimpleClass;

class SimpleClass
{
    protected int $id;
    protected string $name;
    protected bool $isActive;
    protected float $conversion;
    protected array $data;

    public function __construct(int $idValue, string $nameValue, bool $isActiveValue, float $conversionValue, array $dataValue)
    {
        $this->id = $idValue;
        $this->name = $nameValue;
        $this->isActive = $isActiveValue;
        $this->conversion = $conversionValue;
        $this->data = $dataValue;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_active' => $this->isActive,
            'conversion' => $this->conversion,
            'data' => $this->data
        ];
    }
}
