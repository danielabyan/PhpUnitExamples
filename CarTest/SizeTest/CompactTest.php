<?php
namespace Car\SizeTest;


use Car\Size\Compact;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

class CompactTest extends TestCase
{
    public function testIsSizeInterfaceInstance()
    {
        $size = new Compact();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}