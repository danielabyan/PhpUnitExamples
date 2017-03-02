<?php
namespace Car\SizeTest;


use Car\Size\SizeInterface;
use Car\Size\SubCompact;
use PHPUnit\Framework\TestCase;

/**
 * Class SubCompactTest
 * @package Car\SizeTest
 */
class SubCompactTest extends TestCase
{

    /**
     * @covers SubCompact::__construct
     */
    public function testIsSizeInterfaceInstance()
    {
        $size = new SubCompact();
        $this->assertInstanceOf(SizeInterface::class, $size);
    }
}