<?php

namespace CarTest\CommonTest;

use Car\Common\PriceCalculator;
use Car\Size\Large;
use Car\Type\Luxury;
use PHPUnit\Framework\TestCase;

class PriceCalculatorTest extends TestCase
{

    public function testCanBeCreateValidClass()
    {
        $carLargeSize = new Large();
        $carLuxuryType = new Luxury();

        $this->assertInstanceOf(
            PriceCalculator::class,
            new PriceCalculator(
                $carLargeSize, $carLuxuryType
            )
        );
    }

    /**
     * @group critical
     */
    public function testIsValidCalculatedPrice()
    {
        $carLargeSize = new Large();
        $carLuxuryType = new Luxury();

        $priceCalculator = new PriceCalculator($carLargeSize, $carLuxuryType);
        $this->assertInternalType('int', $priceCalculator->calculate());
        $this->assertEquals(11000, $priceCalculator->calculate());
    }
}