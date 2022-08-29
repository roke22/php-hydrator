<?php

namespace Roke\ArrayToObjectFactory\Support;

use Roke\ArrayToObjectFactory\Support\Str;

class ClasesStyles
{
    /**
     * Transform to snake case
     *
     * @param array $array Array data to transform
     * @return array Array transformed
     */
    public static function snake(array $array)
    {
        foreach ($array as $index => $element) {
            $array[Str::snake($index)] = $element;
        }

        return $array;
    }

    /**
     * Transform to camel case
     *
     * @param array $array Array data to transform
     * @return array Array transformed
     */
    public static function camel(array $array)
    {
        foreach ($array as $index => $element) {
            $array[Str::camel($index)] = $element;
        }

        return $array;
    }

    /**
     * Transform to snake case
     *
     * @param array $array Array data to transform
     * @return array Array transformed
     */
    public static function studly(array $array)
    {
        foreach ($array as $index => $element) {
            $array[Str::studly($index)] = $element;
        }

        return $array;
    }

    /**
     * Transform to snake case
     *
     * @param array $array Array data to transform
     * @return array Array transformed
     */
    public static function allCases(array $array)
    {
        foreach ($array as $index => $element) {
            $array[Str::snake($index)] = $element;
            $array[Str::camel($index)] = $element;
            $array[Str::studly($index)] = $element;
        }

        return $array;
    }
}