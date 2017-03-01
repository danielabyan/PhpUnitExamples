<?php

namespace Car\SizeTest;


use Car\Size\Large;
use Car\Size\SizeInterface;
use PHPUnit\Framework\TestCase;

class LargeTest extends TestCase
{
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