<?php
/**
 * Copyright (C) 2017 Joomag, Inc - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Proprietary and confidential.
 */

namespace CarTest;

use Car\Car;
use Car\Common\PriceCalculator;
use Car\InvalidArgumentException;
use Car\Size\Large;
use Car\Size\SizeInterface;
use Car\Type\Luxury;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class CarTestWithAnnotations
 * @package CarTest
 */
class CarTestWithAnnotations extends TestCase
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
        unset(self::$carSize);
        unset(self::$carType);
    }

    /**
     * @covers Car::__construct
     * @uses   Car::getBrandName
     * @uses   Car::getType
     * @uses   Car::getSize
     */
    public function testValidCarBrandName(): string
    {
        $carName = 'Mercedes CLS 550';

        $car = new Car($carName, self::$carType, self::$carSize);
        $this->assertInstanceOf(
            Car::class, $car
        );

        $this->assertSame($carName, $car->getBrandName());
        $this->assertEquals(self::$carType, $car->getType());
        $this->assertEquals(self::$carSize, $car->getSize());

        return $carName;
    }

    /**
     * @depends testValidCarBrandName
     * @group critical
     * @covers Car::getPrice
     * @uses   Car::__construct
     * @uses   PriceCalculator::__construct
     * @uses   PriceCalculator::calculate
     */
    public function testIsValidCarPriceReturn(string $carName)
    {
        $car = new Car($carName, self::$carType, self::$carSize);
        $priceCalculator = new PriceCalculator(self::$carSize, self::$carType);

        $this->assertEquals($priceCalculator->calculate(), $car->getPrice());
    }

    /**
     * @depends testValidCarBrandName
     * @group critical
     * @covers Car::__construct
     */
    public function testCanBeCreateClassWithValidArguments(string $carName)
    {
        $car = new Car($carName, self::$carType, self::$carSize);
        $this->assertInstanceOf(
            Car::class, $car
        );
    }

    /**
     * @expectedException \Error
     * @covers Car::__construct
     */
    public function testCannotCreateCarWithoutArguments()
    {
        new Car();
    }

    /**
     * @covers Car::__construct
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


        new Car($invalidName, self::$carType, self::$carSize);
    }

    /**
     * @expectedException \Car\InvalidArgumentException
     * @expectedExceptionMessage {Brand name} can't be empty
     * @covers Car::__construct
     */
    public function testCannotCreateCarWithEmptyBrandName()
    {
        new Car('', self::$carType, self::$carSize);
    }
}