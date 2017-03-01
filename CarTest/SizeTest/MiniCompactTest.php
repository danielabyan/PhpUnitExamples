<?php
namespace Car\SizeTest;


use Car\Size\MiniCompact;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

class MiniCompactTest extends TestCase
{
    public function testIsSizeInterfaceInstance()
    {
        $size = new MiniCompact();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}