<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Num;

class NumTest extends TestCase
{
    public function testCanGetAccord() : void
    {
        $this->assertEquals(
            Num::accord(1, '%number bottles', '%number bottle', 'none'),
            '1 bottle'
        );
        $this->assertEquals(
            Num::accord(6, '%number bottles', '%number bottle', 'none'),
            '6 bottles'
        );
        $this->assertEquals(
            Num::accord(0, '%number bottles', '%number bottle', 'none'),
            'none'
        );
    }
    public function testCanGetFileSize() : void
    {
        $this->assertEquals(
            Num::fileSize(1),
            '1 byte'
        );
        $this->assertEquals(
            Num::fileSize(1024),
            '1KB'
        );
        $this->assertEquals(
            Num::fileSize(1048576),
            '1MB'
        );
        $this->assertEquals(
            Num::fileSize(2147483648),
            '2GB'
        );
    }
    public function testCanFormatNumber() : void
    {
        $this->assertEquals(
            Num::format(1, 2),
            '1.00'
        );
        $this->assertEquals(
            Num::format(1024),
            '1,024'
        );
        $this->assertEquals(
            Num::format(6200000.45),
            '6,200,000'
        );
    }
    public function testCanCheckNumbersRelations() : void
    {
        $this->assertEquals(
            Num::isBetween(4, 2, 6),
            true
        );
        $this->assertEquals(
            Num::isBetween(1, 2, 6),
            false
        );
        $this->assertEquals(
            Num::isEven(4),
            true
        );
        $this->assertEquals(
            Num::isEven(1),
            false
        );
        $this->assertEquals(
            Num::isNegative(1),
            false
        );
        $this->assertEquals(
            Num::isNegative(-10),
            true
        );
        $this->assertEquals(
            Num::isOdd(4),
            false
        );
        $this->assertEquals(
            Num::isOdd(1),
            true
        );
        $this->assertEquals(
            Num::isOutside(4, 2, 6),
            false
        );
        $this->assertEquals(
            Num::isOutside(1, 2, 6),
            true
        );
        $this->assertEquals(
            Num::isPositive(1),
            true
        );
        $this->assertEquals(
            Num::isPositive(-10),
            false
        );
    }
    public function testCanLimitNumbers() : void
    {
        $this->assertEquals(
            Num::limit(4, 2, 6),
            4
        );
        $this->assertEquals(
            Num::limit(16, 2, 6),
            6
        );
        $this->assertEquals(
            Num::limit(0, 2, 6),
            2
        );
        $this->assertEquals(
            Num::min(4, 2),
            4
        );
        $this->assertEquals(
            Num::min(1, 2),
            2
        );
        $this->assertEquals(
            Num::max(4, 2),
            2
        );
        $this->assertEquals(
            Num::max(1, 2),
            1
        );
    }
    public function testCanGetOrdinal() : void
    {
        $this->assertEquals(
            Num::ordinal(2),
            '2<sup>nd</sup>'
        );
        $this->assertEquals(
            Num::ordinal(4),
            '4<sup>th</sup>'
        );
        $this->assertEquals(
            Num::ordinal(11),
            '11<sup>th</sup>'
        );
        $this->assertEquals(
            Num::ordinal(31),
            '31<sup>st</sup>'
        );
    }
    public function testCanPad() : void
    {
        $this->assertEquals(
            Num::pad(12, 3),
            '012'
        );
        $this->assertEquals(
            Num::pad(1212, 3),
            '1212'
        );
        $this->assertEquals(
            Num::pad(12.1, 5, '0', 'right'),
            '12.10'
        );
    }
    public function canGetPercentOf() : void
    {
        $this->assertEquals(
            Num::percentOf(21),
            21
        );
        $this->assertEquals(
            Num::percentOf(21, 200),
            10.5
        );
        $this->assertEquals(
            Num::percentOf(900, 1600),
            56.25
        );
    }
}
