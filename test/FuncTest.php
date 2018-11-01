<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Func;

class FuncTest extends TestCase
{
    public function testCanOnce() : void
    {
        $GLOBALS['int'] = 0;
        foreach ([1, 1, 1, 1, 1, 1, 1] as $inc) {
            Func::once(function ($inc) {
                $GLOBALS['int'] += $inc;
            })($inc);
        }
        $this->assertEquals($GLOBALS['int'], 1);
    }
}
