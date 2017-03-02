<?php

namespace Car\TestType;

use Car\Type\Economy;
use Car\Type\Family;
use Car\Type\Luxury;
use Car\Type\Sport;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class AllTypesTest extends TestCase
{

    /**
     * @requires PHPUnit 6.0
     * @covers Luxury::__construct
     * @covers Family::__construct
     * @covers Economy::__construct
     * @covers Sport::__construct
     */
    public function testForTypeInterface()
    {
        $types = [
            new Luxury(),
            new Family(),
            new Economy(),
            new Sport()
        ];

        foreach ($types as $type) {
            $this->assertInstanceOf(TypeInterface::class, $type);
        }
    }
}