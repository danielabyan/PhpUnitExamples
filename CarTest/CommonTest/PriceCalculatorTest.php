<?php

namespace CarTest\CommonTest;

use Car\Common\PriceCalculator;
use Car\Size\Large;
use Car\Type\Luxury;
use PHPUnit\Framework\TestCase;

/**
 * Class PriceCalculatorTest
 * @package CarTest\CommonTest
 */
class PriceCalculatorTest extends TestCase
{

    /**
     * @covers Car\Common\PriceCalculator::__construct
     * @uses   Car\Size\Large::__construct
     */
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
     * @covers Car\Common\PriceCalculator::calculate
     * @uses   Car\Common\PriceCalculator::__construct
     * @uses   Car\Size\Large::__construct
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