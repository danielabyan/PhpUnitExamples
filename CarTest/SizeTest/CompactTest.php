<?php
namespace Car\SizeTest;


use Car\Size\Compact;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class CompactTest
 * @package Car\SizeTest
 */
class CompactTest extends TestCase
{
    /**
     * @covers Car\Size\Compact::__construct
     */
    public function testIsSizeInterfaceInstance()
    {
        $size = new Compact();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}