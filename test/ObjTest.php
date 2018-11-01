<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Obj;

class ObjTest extends TestCase
{
    public $option;
    public function testCanCheckIfObjectHasKey() : void
    {
        $this->assertEquals(
            Obj::has($this, 'testCanCheckIfObjectHasKey'),
            true
        );
        $this->assertEquals(
            Obj::has($this, 'option'),
            true
        );
        $this->assertEquals(
            Obj::has($this, 'testCanCheckIfObjectHasValue'),
            false
        );
        $this->assertEquals(
            Obj::has($this, 'otherOption'),
            false
        );
    }
    public function testCanListMethods() : void
    {
        $this->assertEquals(
            Obj::methods(new class {
                function method1()
                {
                    return;
                }
                function method2()
                {
                    return;
                }
            }),
            [
                'method1',
                'method2'
            ]
        );
    }
    public function testCanUnpack() : void
    {
        $this->assertEquals(
            Obj::unpack(new class {
                public $array = [
                    'one' => 1,
                    'two' => 2
                ];
            }, 'array.one'),
            1
        );
        $this->assertEquals(
            Obj::unpack(new class {
                public $array = [
                    'one' => 1,
                    'two' => 2
                ];
            }, 'array.two'),
            2
        );
    }
}
