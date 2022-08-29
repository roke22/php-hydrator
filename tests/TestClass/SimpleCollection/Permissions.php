<?php

namespace Roke\ArrayToObjectFactory\Tests\TestClass\SimpleCollection;

use Roke\ArrayToObjectFactory\Tests\Support\Assert;
use Roke\ArrayToObjectFactory\Tests\Support\Collection;

final class Permissions extends Collection
{
    /**
     *  @var array<Permissions> $items
     */
    protected array $items;

    /**
     * @param array<Roke\ArrayToObjectFactory\Tests\TestClass\SimpleCollection\Permission> $items
     */
    public function __construct(array $items)
    {
        Assert::arrayOf($this->type(), $items);
        $this->items = $items;
    }

    protected function type(): string
    {
        return Permission::class;
    }

    public function toArray()
    {
        $array = [];
        foreach ($this->items() as $item) {
            $array[] = $item->toArray();
        }

        return $array;
    }
}
