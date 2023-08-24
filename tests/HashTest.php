<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Sunaoka\Hash\Hash;

class HashTest extends TestCase
{
    /**
     * @return void
     */
    public function test_without_any_parameter()
    {
        $actual = Hash::merge();

        self::assertSame([], $actual);
    }

    /**
     * @return void
     */
    public function test_one_parameter()
    {
        $actual = Hash::merge(['a' => '1']);

        self::assertSame(['a' => '1'], $actual);
    }

    /**
     * @return void
     */
    public function test_two_parameters()
    {
        $array1 = ['a' => '1', 'b' => '1'];
        $array2 = ['a' => '2', 'c' => '2'];

        $actual = Hash::merge($array1, $array2);

        self::assertSame(['a' => '2', 'b' => '1', 'c' => '2'], $actual);
    }

    /**
     * @return void
     */
    public function test_hash_multiple_parameters()
    {
        $array1 = ['a' => '1', 'b' => ['c' => '1', 'd' => '1', 'g' => ['h' => '1']]];
        $array2 = ['a' => '2', 'b' => ['c' => '2', 'e' => '2', 'g' => ['h' => '2']]];
        $array3 = ['a' => '3', 'b' => ['c' => '3', 'f' => '3', 'g' => ['h' => '3']]];

        $actual = Hash::merge($array1, $array2, $array3);

        self::assertSame(['a' => '3', 'b' => ['c' => '3', 'd' => '1', 'g' => ['h' => '3'], 'e' => '2', 'f' => '3']], $actual);
    }

    /**
     * @return void
     */
    public function test_hash_multiple_parameters2()
    {
        $array[] = ['a' => '1', 'b' => ['1', '1']];
        $array[] = ['a' => '2', 'b' => ['2', '2']];
        $array[] = ['a' => '3', 'b' => ['3', '3']];

        $actual = Hash::merge(...$array);

        self::assertSame(['a' => '3', 'b' => ['3', '3']], $actual);
    }
}
