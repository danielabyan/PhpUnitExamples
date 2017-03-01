<?php
namespace Car\SizeTest;


use Car\Size\Minivan;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

class MinivanTest extends TestCase
{
    public function testIsSizeInterfaceInstance()
    {
        $size = new Minivan();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}