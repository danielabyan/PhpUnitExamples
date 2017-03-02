<?php
namespace Car\TestType;


use Car\Type\Sport;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class SportTest
 * @package Car\TestType
 */
class SportTest extends TestCase
{
    /**
     * @covers Sport::__construct
     */
    public function testIsTypeInterface()
    {
        $sport = new Sport();
        $this->AssertInstanceOf(TypeInterface::class, $sport);
    }
}