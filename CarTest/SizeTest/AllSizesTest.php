<?php
namespace Car\SizeTest;

use Car\Common\Size3D;
use Car\Size\Compact;
use Car\Size\Large;
use Car\Size\MiniCompact;
use Car\Size\Minivan;
use Car\Size\SizeInterface;
use Car\Size\SubCompact;
use PHPUnit\Framework\TestCase;

/**
 * Class AllSizesTest
 * @package Car\SizeTest
 */
class AllSizesTest extends TestCase
{
    /**
     * @dataProvider validSizeProvider
     * @test
     * @covers       Car\Size\Large::__construct
     * @covers       Car\Size\Large::getMinSize
     * @covers       Car\Size\Large::getMaxSize
     * @covers       Car\Size\Compact::__construct
     * @covers       Car\Size\Compact::getMinSize
     * @covers       Car\Size\Compact::getMaxSize
     * @covers       Car\Size\MiniCompact::__construct
     * @covers       Car\Size\MiniCompact::getMinSize
     * @covers       Car\Size\MiniCompact::getMaxSize
     * @covers       Car\Size\Minivan::__construct
     * @covers       Car\Size\Minivan::getMinSize
     * @covers       Car\Size\Minivan::getMaxSize
     * @covers       Car\Size\SubCompact::__construct
     * @covers       Car\Size\SubCompact::getMinSize
     * @covers       Car\Size\SubCompact::getMaxSize
     */
    public function canBeCreateAllSizesWithValidArguments(string $className, Size3D $minSize, Size3D $maxSize)
    {

        /** @var SizeInterface $class */
        $class = new $className();
        $this->assertInstanceOf(Size3D::class, $minSize);
        $this->assertInstanceOf(Size3D::class, $maxSize);
        $this->assertEquals($class->getMinSize(), $minSize);
        $this->assertEquals($class->getMaxSize(), $maxSize);

    }

    public function validSizeProvider()
    {
        return [
            [Large::class, new Size3D(250, 250, 150), new Size3D(300, 450, 250)],
            [Compact::class, new Size3D(200, 300, 150), new Size3D(250, 350, 200)],
            [MiniCompact::class, new Size3D(200, 150, 100), new Size3D(250, 250, 150)],
            [Minivan::class, new Size3D(150, 150, 100), new Size3D(250, 250, 200)],
            [SubCompact::class, new Size3D(150, 150, 200), new Size3D(150, 150, 250)],
        ];
    }
}