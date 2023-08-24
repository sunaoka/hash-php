<?php

namespace Sunaoka\Hash;

class Hash
{
    /**
     * Merge one or more associative arrays recursively
     *
     * This function does not append numeric indexes like array_merge_recursive() function.
     *
     * @param array ...$arrays Variable list of associative array to recursively merge.
     * @return array
     *
     * @see array_merge_recursive()
     */
    public static function merge(...$arrays)
    {
        $result = [];

        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_array($value) && isset($result[$key]) && is_array($result[$key])) {
                    $result[$key] = self::merge($result[$key], $value);
                } else {
                    $result[$key] = $value;
                }
            }
        }

        return $result;
    }
}
