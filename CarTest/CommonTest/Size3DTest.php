<?php
namespace CarTest\CommonTest;

use Car\Common\InvalidArgumentException;
use Car\Common\Size3D;
use PHPUnit\Framework\TestCase;

/**
 * Class Size3DTest
 * @package CarTest\CommonTest
 */
class Size3DTest extends TestCase
{
    /**
     * @requires PHP 7.0
     * @covers Car\Common\Size3D::__construct
     */
    public function testCanBeCreateValid3DSize()
    {
        $this->assertInstanceOf(
            Size3D::class,
            new Size3D(1, 2, 3)
        );
    }

    public function testCannotBeCreateWithZeroSize()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("{Size} can't be zero");

        new Size3D(0, 1, 1);
    }

    /**
     * @expectedException           InvalidArgumentException
     * @expectedExceptionMessage    {Size} can't be negative number
     * @covers Car\Common\Size3D::__construct
     */
    public function testCannotBeCreateWithNegativeSize()
    {
        new Size3D(1, -1, 1);
    }

    /**
     * @covers Car\Common\Size3D::__construct
     */
    public function testSizesCannotBeCreateSize3DWithoutConstructorArguments()
    {
        $this->expectException(\Error::class);

        new Size3D();
    }

    /**
     * @covers Car\Common\Size3D::getWidth
     * @covers Car\Common\Size3D::getHeight
     * @covers Car\Common\Size3D::getDepth
     * @uses   Car\Common\Size3D::__construct
     */
    public function testCanBeSetValidSizes()
    {
        $x = 1;
        $y = 2;
        $z = 3;
        $size3D = new Size3D($x, $y, $z);

        $this->assertEquals($size3D->getWidth(), $x);
        $this->assertEquals($size3D->getHeight(), $y);
        $this->assertEquals($size3D->getDepth(), $z);
    }

    /**
     * @covers Car\Common\Size3D::getWidth
     * @covers Car\Common\Size3D::getHeight
     * @covers Car\Common\Size3D::getDepth
     * @uses   Car\Common\Size3D::__construct
     */
    public function testIsNumericValues()
    {
        $size3D = new Size3D(1, 2, 3);

        $this->assertInternalType('int', $size3D->getDepth());
        $this->assertInternalType('int', $size3D->getWidth());
        $this->assertInternalType('int', $size3D->getHeight());
    }
}