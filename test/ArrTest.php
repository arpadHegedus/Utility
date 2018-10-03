<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Arr;

class ArrTest extends TestCase
{
    public function testCanAppendAndPrependAndRemove() : void
    {
        $this->assertEquals(
            Arr::append([1, 'and', true], 9.0),
            [1, 'and', true, 9.0]
        );
        $this->assertEquals(
            Arr::prepend([1, 'and', true], 9.0),
            [9.0, 1, 'and', true]
        );
        $this->assertEquals(
            Arr::removeFirst([1, 'and', true]),
            ['and', true]
        );
        $this->assertEquals(
            Arr::removeLast([1, 'and', true]),
            [1, 'and']
        );
        $this->assertEquals(
            Arr::removeValue([1, 'and', true], 'and'),
            [1, true]
        );
    }
    public function testCanCalculateAverage() : void
    {
        $this->assertEquals(
            Arr::average([1, 10]),
            6.0
        );
        $this->assertEquals(
            Arr::average([1, 10], 2),
            5.5
        );
    }
    public function testCanPluck() : void
    {
        $this->assertEquals(
            Arr::pluck([
                ['name' => 'John', 'age' => 30],
                ['name' => 'Tracy', 'age' => 62],
                ['name' => 'Miriam', 'age' => 78]
            ], 'name'),
            ['John', 'Tracy', 'Miriam']
        );
        $this->assertEquals(
            Arr::average([1, 10], 2),
            5.5
        );
    }
    public function testCanBuildArrayFromBlueprint() : void
    {
        $this->assertEquals(
            Arr::blueprint(
                [
                    'string',
                    false,
                    'yeah',
                    'string 2',
                    26,
                    'more string'
                ],
                [
                    'yeah' => function ($value) {
                        return (is_string($value) && $value === 'yeah');
                    },
                    'age' => 'is_integer',
                    'has_hobbies' => 'is_bool',
                    'married' => 'is_bool',
                    'firstname' => 'is_string',
                    'lastname' => 'is_string'
                ],
                [
                    'yeah' => false,
                    'age' => 20,
                    'married' => false,
                ]
            ),
            [
                'yeah' => 'yeah',
                'age' => 26,
                'married' => false,
                'has_hobbies' => false,
                'firstname' => 'string',
                'lastname' => 'string 2'
            ]
        );
        $this->assertEquals(
            Arr::blueprint(
                [
                    'lastname' => 'Smith',
                    'George',
                    ['long walks', 'reading'],
                    'married' => 'complicated'
                ],
                [
                    'has_hobbies' => ['is_bool', 'is_array'],
                    'married' => 'is_bool',
                    'firstname' => 'is_string',
                    'lastname' => 'is_string'
                ],
                [
                    'has_hobbies' => false,
                    'married' => false,
                ]
            ),
            [
                'has_hobbies' => ['long walks', 'reading'],
                'married' => false,
                'firstname' => 'George',
                'lastname' => 'Smith'
            ]
        );
    }
    public function testCanCleanArray() : void
    {
        $this->assertEquals(
            Arr::clean([0, 'and', false, true, 0.0001, 0.0]),
            ['and', true, 0.0001]
        );
    }
    public function testCanTellIfArrayContainsValue() : void
    {
        $this->assertEquals(
            Arr::contains([0, 'and', false, true, 0.0001], 'and'),
            true
        );
        $this->assertEquals(
            Arr::contains([
                'name' => 'John',
                'age' => 30
            ], 30),
            true
        );
        $this->assertEquals(
            Arr::containsAll([
                'name' => 'John',
                'age' => 30
            ], [
                'John',
                30
            ]),
            true
        );
        $this->assertEquals(
            Arr::containsAll([
                'name' => 'John',
                'age' => 30
            ], [
                'John',
                30,
                true
            ]),
            false
        );
        $this->assertEquals(
            Arr::containsAny([
                'name' => 'John',
                'age' => 30
            ], [
                'john',
                true
            ]),
            false
        );
        $this->assertEquals(
            Arr::containsAny([
                'name' => 'John',
                'age' => 30
            ], [
                'john',
                30
            ]),
            true
        );
        $this->assertEquals(
            Arr::has([
                'name' => 'John',
                'age' => 30
            ], 'age'),
            true
        );
        $this->assertEquals(
            Arr::hasAll([
                'name' => 'John',
                'age' => 30
            ], ['name', 'age']),
            true
        );
        $this->assertEquals(
            Arr::hasAll([
                'name' => 'John',
                'age' => 30
            ], ['name', 'age', 'hobbies']),
            false
        );
        $this->assertEquals(
            Arr::hasAny([
                'name' => 'John',
                'age' => 30
            ], ['hobbies', 'age']),
            true
        );
        $this->assertEquals(
            Arr::hasAny([
                'name' => 'John',
                'age' => 30
            ], ['hobbies', 'height']),
            false
        );
        $this->assertEquals(
            Arr::has([0, 'and', false, true, 0.0001], 3),
            true
        );
        $this->assertEquals(
            Arr::has([0, 'and', false, true, 0.0001], 5),
            false
        );
        $this->assertEquals(
            Arr::hasAll([0, 'and', false, true, 0.0001], [3, 6]),
            false
        );
        $this->assertEquals(
            Arr::hasAny([0, 'and', false, true, 0.0001], [6, 2]),
            true
        );
    }
    public static function addTwo($value)
    {
        return $value + 2;
    }
    public function testCanModifyEach() : void
    {
        $this->assertEquals(
            Arr::each([1, 2, 3, 4], function ($value) {
                return $value + 1;
            }),
            [2, 3, 4, 5]
        );
        $this->assertEquals(
            Arr::each([1, 2, 3, 4], 'Utility\\Test\\ArrTest::addTwo'),
            [3, 4, 5, 6]
        );
        $this->assertEquals(
            Arr::each(['A', 'B', 'C'], 'strtolower'),
            ['a', 'b', 'c']
        );
    }
    public static function isNotTwo($value)
    {
        return $value !== 2;
    }
    public function testCanFilterArray() : void
    {
        $this->assertEquals(
            Arr::filter([1, 2, 3, 4], function ($value) {
                return $value !== 1;
            }, 0, true),
            [2, 3, 4]
        );
        $this->assertEquals(
            Arr::filter([1, 2, 3, 4], 'Utility\\Test\\ArrTest::isNotTwo', 0, true),
            [1, 3, 4]
        );
        $this->assertEquals(
            Arr::filter([16, 'A', 'B'], 'is_string', 0, true),
            ['A', 'B']
        );
    }
    public function testCanFindValues() : void
    {
        $this->assertEquals(
            Arr::find([1, 2, 3, 4], function ($value) {
                return $value > 2;
            }),
            3
        );
    }
    public function testCanFindFirstOrLastValues() : void
    {
        $this->assertEquals(
            Arr::first([1, 2, 3, 4]),
            1
        );
        $this->assertEquals(
            Arr::first([1, 2, 3, 4], 2),
            [ 1, 2 ]
        );
        $this->assertEquals(
            Arr::initial([1, 2, 3, 4, 5]),
            [ 1, 2, 3, 4 ]
        );
        $this->assertEquals(
            Arr::initial([1, 2, 3, 4, 5], 2),
            [ 1, 2, 3 ]
        );
        $this->assertEquals(
            Arr::last([1, 2, 3, 4, 5]),
            5
        );
        $this->assertEquals(
            Arr::last([1, 2, 3, 4, 5], 2),
            [ 4, 5 ]
        );
        $this->assertEquals(
            Arr::rest([1, 2, 3, 4, 5]),
            [ 2, 3, 4, 5 ]
        );
        $this->assertEquals(
            Arr::rest([1, 2, 3, 4, 5], 2),
            [ 3, 4, 5 ]
        );
    }
    public function testCanFlattenAndUnflatten() : void
    {
        $this->assertEquals(
            Arr::dot([
                'name' => 'John',
                'details' => [
                    'height' => 178,
                    'age' => 30,
                    'eyes' => 'brown'
                ],
                'hobbies' => [
                    'reading' => [
                        'sci-fi',
                        'horror' => [
                            'from' => [
                                'Stephen King',
                                'Bram Stoker'
                            ]
                        ]
                    ],
                    'walks in parks',
                    'stargazing'
                ]
            ]),
            [
                'name' => 'John',
                'details.height' => 178,
                'details.age' => 30,
                'details.eyes' => 'brown',
                'hobbies.reading.0' => 'sci-fi',
                'hobbies.reading.horror.from.0' => 'Stephen King',
                'hobbies.reading.horror.from.1' => 'Bram Stoker',
                'hobbies.0' => 'walks in parks',
                'hobbies.1' => 'stargazing'
            ]
        );
        $this->assertEquals(
            Arr::dot([
                'name' => 'John',
                'details' => [
                    'height' => 178,
                    'age' => 30,
                    'eyes' => 'brown'
                ],
                'hobbies' => [
                    'reading' => [
                        'sci-fi',
                        'horror' => [
                            'from' => [
                                'Stephen King',
                                'Bram Stoker'
                            ]
                        ]
                    ],
                    'walks in parks',
                    'stargazing'
                ]
                ], ':'),
            [
                'name' => 'John',
                'details:height' => 178,
                'details:age' => 30,
                'details:eyes' => 'brown',
                'hobbies:reading:0' => 'sci-fi',
                'hobbies:reading:horror:from:0' => 'Stephen King',
                'hobbies:reading:horror:from:1' => 'Bram Stoker',
                'hobbies:0' => 'walks in parks',
                'hobbies:1' => 'stargazing'
            ]
        );
        $this->assertEquals(
            Arr::undot([
                'name' => 'John',
                'details.height' => 178,
                'details.age' => 30,
                'details.eyes' => 'brown',
                'hobbies.reading.0' => 'sci-fi',
                'hobbies.reading.horror.from.0' => 'Stephen King',
                'hobbies.reading.horror.from.1' => 'Bram Stoker',
                'hobbies.0' => 'walks in parks',
                'hobbies.1' => 'stargazing'
            ]),
            [
                'name' => 'John',
                'details' => [
                    'height' => 178,
                    'age' => 30,
                    'eyes' => 'brown'
                ],
                'hobbies' => [
                    'reading' => [
                        'sci-fi',
                        'horror' => [
                            'from' => [
                                'Stephen King',
                                'Bram Stoker'
                            ]
                        ]
                    ],
                    'walks in parks',
                    'stargazing'
                ]
            ]
        );
    }
    public function testCanGetIntersection() : void
    {
        $this->assertEquals(
            Arr::intersection([1, 2, 3], [3, 4, 2]),
            [2, 3]
        );
        $this->assertEquals(
            Arr::intersection([1, 2, 3], [4, 5, 6]),
            []
        );
        $this->assertEquals(
            Arr::intersects([1, 2, 3], [3, 4, 2]),
            true
        );
        $this->assertEquals(
            Arr::intersects([1, 2, 3], [4, 5, 6]),
            false
        );
    }
    public function testCanTellIfArrayIsAssociative() : void
    {
        $this->assertEquals(
            Arr::isAssoc([1, 2, 3]),
            false
        );
        $this->assertEquals(
            Arr::isAssoc([4 => 1, 6 => 2, 2 => 3]),
            false
        );
        $this->assertEquals(
            Arr::isAssoc([
                'name' => 'John',
                'age' => 26
            ]),
            true
        );
        $this->assertEquals(
            Arr::isAssoc([
                'name' => 'Jonh',
                2 => 26,
                4 => 180
            ]),
            true
        );
    }
    public function testCanMapArrays() : void
    {
        $this->assertEquals(
            Arr::map([1, 2, 3], function ($value) {
                return $value + 1;
            }),
            [2, 3, 4]
        );
        $this->assertEquals(
            Arr::map([1, 2, 3], function ($value, $multiplier) {
                return $value * $multiplier;
            }, [2, 3, 4]),
            [2, 6, 12]
        );
        $this->assertEquals(
            Arr::mapRecursive([1, 2, 3, [1, 2, 3]], function ($value) {
                return $value + 1;
            }),
            [2, 3, 4, [2, 3, 4]]
        );
    }
    public function testCanMatchValues() : void
    {
        $this->assertEquals(
            Arr::matches([1, 2, 3], function ($value) {
                return $value < 4;
            }),
            true
        );
        $this->assertEquals(
            Arr::matches([1, 2, 3], function ($value) {
                return $value < 2;
            }),
            false
        );
        $this->assertEquals(
            Arr::matchesAny([1, 2, 3], 'is_integer'),
            true
        );
        $this->assertEquals(
            Arr::matchesAny([1, 2, 3], 'is_string'),
            false
        );
    }
    public function testCanGetMinAndMaxValues() : void
    {
        $this->assertEquals(
            Arr::max([16, 22, 4]),
            22
        );
        $this->assertEquals(
            Arr::max([16, 22, 4], function ($value) {
                return 0.5 * $value;
            }),
            11
        );
        $this->assertEquals(
            Arr::min([16, 22, 4]),
            4
        );
        $this->assertEquals(
            Arr::min([16, 22, 4], function ($value) {
                return 0.5 * $value;
            }),
            2
        );
    }
    public function testCanNormalizeArray() : void
    {
        $this->assertTrue(
            Arr::normalize([
                'beta' => true,
                'alpha' => true,
                5 => true
            ]) === [
                'alpha' => true,
                'beta' => true,
                true
            ]
        );
    }
    public function testCanGetRandomValueFromArray() : void
    {
        $this->assertContains(
            Arr::random([1, 2, 3, 4]),
            [1, 2, 3, 4]
        );
    }
    public function testCanCreateARange() : void
    {
        $this->assertEquals(
            Arr::range(1, 4),
            [1, 2, 3, 4]
        );
    }
    public function testCanRejectValues() : void
    {
        $this->assertEquals(
            Arr::reject([1, 2, 3, 4, 5], function ($value) {
                return $value % 2;
            }, false, true),
            [2, 4]
        );
    }
    public function testCanRepeatValue() : void
    {
        $this->assertEquals(
            Arr::repeat('yes', 4),
            ['yes', 'yes', 'yes', 'yes']
        );
        $this->assertEquals(
            Arr::repeat('yes', -4),
            []
        );
    }
    public function testCanReplace() : void
    {
        $this->assertEquals(
            Arr::replace([
                'dog and mouse',
                'key' => 'value of a dog',
                'dog' => 'cat'
            ], 'dog', 'cat'),
            [
                'cat and mouse',
                'key' => 'value of a cat',
                'dog' => 'cat'
            ]
        );
        $this->assertEquals(
            Arr::replace([
                'dag and mouse',
                'dog in the wind',
                'dog eats dag'
            ], '/d[o|a]g/', 'cat'),
            [
                'cat and mouse',
                'cat in the wind',
                'cat eats cat'
            ]
        );
    }
    public function testCanUnique() : void
    {
        $this->assertEquals(
            Arr::unique([1, 2, 3, 4, 5, 1, 2, 3]),
            [1, 2, 3, 4, 5]
        );
    }
    public function testCanReturnWithout() : void
    {
        $this->assertEquals(
            Arr::without([1, 2, 3, 4, 5], 3, 4),
            [1, 2, 5]
        );
    }
}
