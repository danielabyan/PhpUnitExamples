<?php
namespace Car\SizeTest;


use Car\Size\MiniCompact;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class MiniCompactTest
 * @package Car\SizeTest
 */
class MiniCompactTest extends TestCase
{

    /**
     * @covers Car\Size\MiniCompact::__construct
     */
    public function testIsSizeInterfaceInstance()
    {
        $size = new MiniCompact();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}