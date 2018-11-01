<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Misc;

class MiscTest extends TestCase
{
    public function testCanCheckAbides() : void
    {
        $this->assertEquals(
            Misc::abides('Oi', ['is_string']),
            true
        );
        $this->assertEquals(
            Misc::abides(16, ['is_string']),
            false
        );
        $this->assertEquals(
            Misc::abides('Oi', ['is_string', 'is_integer']),
            false
        );
        $this->assertEquals(
            Misc::abidesAny('Oi', ['is_string', 'is_integer']),
            true
        );
        $this->assertEquals(
            Misc::abides(14, [function ($value) {
                return $value > 13;
            }]),
            true
        );
        $this->assertEquals(
            Misc::abides(14, [function ($value) {
                return $value > 27;
            }]),
            false
        );
    }
    public function testCanAdd() : void
    {
        $this->assertEquals(
            Misc::add(12, 4),
            16
        );
        $this->assertEquals(
            Misc::add('this is ', 4),
            'this is 4'
        );
        $this->assertEquals(
            Misc::add(4, ' this is'),
            '4 this is'
        );
        $this->assertEquals(
            Misc::add('i do not know', ' this is'),
            'i do not know this is'
        );
        $this->assertEquals(
            Misc::add(4, true),
            4
        );
        $this->assertEquals(
            Misc::add(false, 4),
            4
        );
        $this->assertEquals(
            Misc::add(4, false),
            false
        );
        $this->assertEquals(
            Misc::add([1, 2, 3], 'hello'),
            [1, 2, 3, 'hello']
        );
        $this->assertEquals(
            Misc::add([1, 2, 3], [4, 5, 6]),
            [1, 2, 3, 4, 5, 6]
        );
        $this->assertEquals(
            Misc::add([
                'key'        => 'value',
                'anotherkey' => [
                    'another value'
                ]
            ], [
                'anotherkey' => [
                    'hello'
                ]
            ]),
            [
                'key'        => 'value',
                'anotherkey' => [
                    'another value',
                    'hello'
                ]
            ]
        );
        $this->assertEquals(
            Misc::add([
                'key'        => 'value',
                'anotherkey' => [
                    'another value'
                ]
            ], [
                'key' => ' and a different value'
            ]),
            [
                'key'        => 'value and a different value',
                'anotherkey' => [
                    'another value'
                ]
            ]
        );
    }
    public function testCanMerge() : void
    {
        $this->assertEquals(
            Misc::merge(12, 4),
            16
        );
        $this->assertEquals(
            Misc::merge('this is ', 4),
            'this is 4'
        );
        $this->assertEquals(
            Misc::merge(4, ' this is'),
            '4 this is'
        );
        $this->assertEquals(
            Misc::merge('i do not know', ' this is'),
            'i do not know this is'
        );
        $this->assertEquals(
            Misc::merge(4, true),
            true
        );
        $this->assertEquals(
            Misc::merge(false, 4),
            4
        );
        $this->assertEquals(
            Misc::merge(4, false),
            false
        );
        $this->assertEquals(
            Misc::merge([1, 2, 3], 'hello'),
            'hello'
        );
        $this->assertEquals(
            Misc::merge([1, 2, 3], [4, 5, 6]),
            [1, 2, 3, 4, 5, 6]
        );
        $this->assertEquals(
            Misc::merge([
                'key'        => 'value',
                'anotherkey' => [
                    'another value'
                ]
            ], [
                'anotherkey' => [
                    'hello'
                ]
            ]),
            [
                'key'        => 'value',
                'anotherkey' => [
                    'another value',
                    'hello'
                ]
            ]
        );
        $this->assertEquals(
            Misc::merge([
                'key'        => 'value',
                'anotherkey' => [
                    'another value'
                ]
            ], [
                'key' => ' and a different value'
            ]),
            [
                'key'        => ' and a different value',
                'anotherkey' => [
                    'another value'
                ]
            ]
        );
    }
}
