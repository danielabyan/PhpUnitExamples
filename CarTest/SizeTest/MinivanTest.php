<?php
namespace Car\SizeTest;


use Car\Size\Minivan;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class MinivanTest
 * @package Car\SizeTest
 */
class MinivanTest extends TestCase
{
    /**
     * @covers Car\Size\Minivan::__construct
     */
    public function testIsSizeInterfaceInstance()
    {
        $size = new Minivan();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}