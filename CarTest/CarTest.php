<?php

namespace CarTest;

use Car\Car;
use Car\Common\PriceCalculator;
use Car\InvalidArgumentException;
use Car\Size\Large;
use Car\Type\Luxury;
use PHPUnit\Framework\TestCase;

/**
 * Class CarTest
 * @package CarTest
 */
class CarTest extends TestCase
{
    private $carSize;

    private $carType;

    public function setUp()
    {
        $this->carType = new Luxury();
        $this->carSize = new Large();
    }

    public function tearDown()
    {
        unset($this->carSize);
        unset($this->carType);
    }

    /**
     * @covers Car\Car::__construct
     * @uses   Car\Car::getBrandName
     * @uses   Car\Car::getType
     * @uses   Car\Car::getSize
     */
    public function testValidCarBrandName()
    {
        $carName = 'Mercedes CLS 550';

        $car = new Car($carName, $this->carType, $this->carSize);
        $this->assertInstanceOf(
            Car::class, $car
        );

        $this->assertSame($carName, $car->getBrandName());
        $this->assertEquals($this->carType, $car->getType());
        $this->assertEquals($this->carSize, $car->getSize());
    }

    /**
     * @covers Car\Car::getPrice
     * @uses   Car\Car::__construct
     * @uses   Car\Common\PriceCalculator::__construct
     * @uses   Car\Common\PriceCalculator::calculate
     */
    public function testIsValidCarPriceReturn()
    {
        $car = new Car('Mercedes CLS 550', $this->carType, $this->carSize);
        $priceCalculator = new PriceCalculator($this->carSize, $this->carType);

        $this->assertEquals($priceCalculator->calculate(), $car->getPrice());
    }

    /**
     * @covers Car\Car::__construct
     */
    public function testCanBeCreateClassWithValidArguments()
    {
        $car = new Car('Mercedes CLS 550', $this->carType, $this->carSize);
        $this->assertInstanceOf(
            Car::class, $car
        );
    }

    /**
     * @covers Car\Car::__construct
     */
    public function testCannotCreateCarWithoutArguments()
    {
        $this->expectException(\Error::class);
        new Car();
    }

    /**
     * @covers Car\Car::__construct
     */
    public function testCannotCreateCarWithInvalidName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp("/{Brand name} is longer than \d+ characters/");

        $invalidName = '';
        for ($i = 0; $i < Car::BRAND_NAME_SYMBOLS_COUNT; $i++) {
            $invalidName .= 'a';
        }
        $invalidName .= 'veryLong';


        new Car($invalidName, $this->carType, $this->carSize);
    }

    /**
     * @covers Car\Car::__construct
     */
    public function testCannotCreateCarWithEmptyBrandName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("{Brand name} can't be empty");

        new Car('', $this->carType, $this->carSize);
    }
}