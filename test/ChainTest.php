<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Chain;

class ChainTest extends TestCase
{
    public function testCanChain() : void
    {
        $this->assertEquals(
            'slug-case',
            Chain::start('Slug case', 'Utility\\Str')->slug()->break()
        );
    }
}
