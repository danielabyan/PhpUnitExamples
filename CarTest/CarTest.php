<?php

namespace CarTest;

use Car\Car;
use Car\Common\PriceCalculator;
use Car\InvalidArgumentException;
use Car\Size\Large;
use Car\Size\SizeInterface;
use Car\Type\Luxury;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    /** @var SizeInterface */
    private $carSize;

    /** @var TypeInterface */
    private $carType;

    public function setUp()
    {
        $this->carType = new Luxury();
        $this->carSize = new Large();
    }

    /**
     * @return string
     */
    public function testValidCarBrandName(): string
    {
        $carName = 'Mercedes CLS 550';

        $car = new Car($carName, $this->carType, $this->carSize);
        $this->assertInstanceOf(
            Car::class, $car
        );

        $this->assertSame($carName, $car->getBrandName());
        $this->assertEquals($this->carType, $car->getType());
        $this->assertEquals($this->carSize, $car->getSize());

        return $carName;
    }

    /**
     * @depends testValidCarBrandName
     * @group critical
     */
    public function testIsValidCarPriceReturn(string $carName)
    {
        $car = new Car($carName, $this->carType, $this->carSize);
        $priceCalculator = new PriceCalculator($this->carSize, $this->carType);

        $this->assertEquals($priceCalculator->calculate(), $car->getPrice());
    }

    /**
     * @depends testValidCarBrandName
     * @group critical
     */
    public function testCanBeCreateClassWithValidArguments(string $carName)
    {
        $car = new Car($carName, $this->carType, $this->carSize);
        $this->assertInstanceOf(
            Car::class, $car
        );
    }

    public function testCannotCreateCarWithoutArguments()
    {
        $this->expectException(\Error::class);
        new Car();
    }

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
     * @expectedException \Car\InvalidArgumentException
     * @expectedExceptionMessage {Brand name} can't be empty
     */
    public function testCannotCreateCarWithEmptyBrandName()
    {
        new Car('', $this->carType, $this->carSize);
    }

    /**
     * @afterClass
     */
    public function clean()
    {
        unset($this->carSize);
        unset($this->carType);
    }
}