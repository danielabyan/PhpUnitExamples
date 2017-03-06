<?php

namespace CarTest;

use Car\Car;
use Car\CarBuilder;
use Car\Size\Large;
use Car\Size\SizeInterface;
use Car\Type\Luxury;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class CarBuilderTest
 * @package CarTest
 */
class CarBuilderTest extends TestCase
{
    /** @var SizeInterface */
    private static $carSize;

    /** @var TypeInterface */
    private static $carType;

    /**
     * @beforeClass
     */
    public static function init()
    {
        self::$carType = new Luxury();
        self::$carSize = new Large();
    }

    /**
     * @afterClass
     */
    public function clean()
    {
        unset($this->carSize);
        unset($this->carType);
    }

    /**
     * @group critical
     * @covers Car\CarBuilder::build
     * @covers Car\CarBuilder::getCar
     * @uses Car\CarBuilder::setBrandName
     * @uses Car\CarBuilder::setSize
     * @uses Car\CarBuilder::setType
     */
    public function testCarBuilding()
    {
        $carBuilder = new CarBuilder();
        $carBuilder->setBrandName("Mercedes SLC 550");
        $carBuilder->setSize(self::$carSize);
        $carBuilder->setType(self::$carType);
        $carBuilder->build();

        $this->assertInstanceOf(Car::class, $carBuilder->getCar());
    }
}