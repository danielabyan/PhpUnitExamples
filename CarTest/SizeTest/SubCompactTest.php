<?php
namespace Car\SizeTest;


use Car\Size\SubCompact;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

class SubCompactTest extends TestCase
{
    public function testIsSizeInterfaceInstance()
    {
        $size = new SubCompact();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}