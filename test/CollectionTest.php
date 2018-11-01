<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Collection;

class CollectionTest extends TestCase
{
    public function testCanGet() : void
    {
        $this->assertEquals(
            Collection::get([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'name'),
            'John'
        );
        $this->assertEquals(
            Collection::get([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'attributes.age'),
            30
        );
        $this->assertEquals(
            Collection::get([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'hobbies.1'),
            'walk'
        );
        $this->assertEquals(
            Collection::get([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'hobbies.4'),
            null
        );
    }
    public function testCanGroupValues() : void
    {
        $this->assertEquals(
            Collection::group([1, 2, 3, 4, 5], function ($value) {
                return $value % 2 == 0;
            }),
            [
                [1, 3, 5],
                [2, 4]
            ]
        );
        $this->assertEquals(
            Collection::group([1, 2, 3, 4, 5], function ($value) {
                return $value > 3 ? 'greater' : 'lesser';
            }),
            [
                'lesser' => [1, 2, 3],
                'greater' => [4, 5]
            ]
        );
    }
    public function testCanGetKeysAndValues() : void
    {
        $this->assertEquals(
            Collection::keys([1, 2, 3, 4, 5]),
            [0, 1, 2, 3, 4]
        );
        $this->assertEquals(
            Collection::keys([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ]),
            ['name', 'attributes', 'hobbies']
        );
        $this->assertEquals(
            Collection::values([1, 2, 3, 4, 5]),
            [1, 2, 3, 4, 5]
        );
        $this->assertEquals(
            Collection::values([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ]),
            [
                'John',
                [
                    'age' => 30,
                    'height' => 182,
                ],
                ['tv', 'walk', 'travel']
            ]
        );
        $this->assertEquals(
            Collection::values(new class {
                public $name = 'John';
                public $attributes = [
                    'age' => 30,
                    'height' => 182,
                ];
            }),
            [
                'John',
                [
                    'age' => 30,
                    'height' => 182,
                ]
            ]
        );
    }
    public function testCansets() : void
    {
        $this->assertEquals(
            Collection::set([1, 2, 3, 4, 5], 'age', 26),
            [1, 2, 3, 4, 5, 'age' => 26]
        );
        $this->assertEquals(
            Collection::set([1, 2, 3, 4, 5], '5', 26),
            [1, 2, 3, 4, 5, 26]
        );
        $this->assertEquals(
            Collection::set([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'attributes.age', 26),
            [
                'name' => 'John',
                'attributes' => [
                    'age' => 26,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ]
        );
        $this->assertEquals(
            Collection::set([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'attributes.married.to', 'Margaret'),
            [
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                    'married' => [
                        'to' => 'Margaret'
                    ]
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ]
        );
        $changed = Collection::set(new class {
            public $name = 'John';
            public $attributes = [
                'age' => 30,
                'height' => 182,
            ];
        }, 'attributes.age', 26);
        $this->assertTrue(is_object($changed));
        $this->assertEquals(
            (array) $changed,
            [
                'name' => 'John',
                'attributes' => [
                    'age' => 26,
                    'height' => 182,
                ],
            ]
        );
    }
    public function testCanremoves() : void
    {
        $this->assertEquals(
            Collection::remove([1, 2, 3, 4, 5], '1'),
            [0 => 1, 2 => 3, 3 => 4, 4 => 5]
        );
        $this->assertEquals(
            Collection::remove([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'attributes.age'),
            [
                'name' => 'John',
                'attributes' => [
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ]
        );
        $this->assertEquals(
            Collection::remove([
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182,
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ], 'attributes.married.to'),
            [
                'name' => 'John',
                'attributes' => [
                    'age' => 30,
                    'height' => 182
                ],
                'hobbies' => ['tv', 'walk', 'travel']
            ]
        );
        $changed = Collection::remove(new class {
            public $name = 'John';
            public $attributes = [
                'age' => 30,
                'height' => 182,
            ];
        }, 'attributes.age');
        $this->assertTrue(is_object($changed));
        $this->assertEquals(
            (array) $changed,
            [
                'name' => 'John',
                'attributes' => [
                    'height' => 182,
                ],
            ]
        );
    }
    public function testCanSort() : void
    {
        $this->assertEquals(
            Collection::sort([2, 1, 3]),
            [1, 2, 3]
        );
        $this->assertEquals(
            Collection::sort(['b', 2, 1, 3, 'a']),
            ['a', 'b', 1, 2, 3]
        );
        $this->assertEquals(
            Collection::sort(['a' => 'b', 'b' => 'a']),
            ['b' => 'a', 'a' => 'b']
        );
        $this->assertEquals(
            Collection::sort([2, 1, 3], 'desc'),
            [3, 2, 1]
        );
        $this->assertEquals(
            Collection::sort(['b', 2, 1, 3, 'a'], 'DESC'),
            [3, 2, 1, 'b', 'a']
        );
        $this->assertEquals(
            Collection::sort(['a' => 'b', 'b' => 'a'], 'DESC'),
            ['a' => 'b', 'b' => 'a']
        );
        $this->assertEquals(
            Collection::sort([
                'ceo' => [
                    'name' => 'John',
                    'age' => 30
                ],
                'secretary' => [
                    'name' => 'Margaret',
                    'age' => 21
                ],
                'employee' => [
                    'name' => 'Julia',
                    'age' => 26
                ]
                ], 'ASC', 'age'),
            [
                'secretary' => [
                    'name' => 'Margaret',
                    'age' => 21
                ],
                'employee' => [
                    'name' => 'Julia',
                    'age' => 26
                ],
                'ceo' => [
                    'name' => 'John',
                    'age' => 30
                ],
            ]
        );
        $this->assertEquals(
            Collection::sort([
                'ceo' => [
                    'name' => 'John',
                    'age' => 30
                ],
                'secretary' => [
                    'name' => 'Margaret',
                    'age' => 21
                ],
                'employee' => [
                    'name' => 'Julia',
                    'age' => 26
                ]
                ], 'ASC', 'name'),
            [
                'ceo' => [
                    'name' => 'John',
                    'age' => 30
                ],
                'employee' => [
                    'name' => 'Julia',
                    'age' => 26
                ],
                'secretary' => [
                    'name' => 'Margaret',
                    'age' => 21
                ]
            ]
        );


        $this->assertEquals(
            Collection::sortKeys(['b' => 'a', 'a' => 'b']),
            ['a' => 'b', 'b' => 'a']
        );
        $this->assertEquals(
            Collection::sortKeys([1 => 3, 4 => 2, 0 => 1], 'desc'),
            [4 => 2, 1 => 3, 0 => 1]
        );
        $this->assertEquals(
            Collection::sortKeys(['b', 2, 1, 3, 'a']),
            ['b', 2, 1, 3, 'a']
        );
        $this->assertEquals(
            Collection::sortKeys(['a' => 'b', 'b' => 'a'], 'DESC'),
            ['b' => 'a', 'a' => 'b']
        );
        $this->assertEquals(
            Collection::sortKeys([
                'ceo' => [
                    'name' => 'John',
                    'age' => 30
                ],
                'secretary' => [
                    'name' => 'Margaret',
                    'age' => 21
                ],
                'employee' => [
                    'name' => 'Julia',
                    'age' => 26
                ]
                ], 'ASC', 'age'),
            [
                'ceo' => [
                    'name' => 'John',
                    'age' => 30
                ],
                'employee' => [
                    'name' => 'Julia',
                    'age' => 26
                ],
                'secretary' => [
                    'name' => 'Margaret',
                    'age' => 21
                ]
            ]
        );
    }
}
