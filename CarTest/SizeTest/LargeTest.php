<?php

namespace Car\SizeTest;


use Car\Size\Large;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class LargeTest
 * @package Car\SizeTest
 */
class LargeTest extends TestCase
{

    /**
     * @covers Car\Size\Large::__construct
     */
    public function testIsSizeInterfaceInstance()
    {
        $size = new Large();
        if ($size instanceof SizeInterface) {
            $this->assertTrue(true);
        } else {
            $this->fail('{Large} not instance of SizeInterface');
        }
    }
}