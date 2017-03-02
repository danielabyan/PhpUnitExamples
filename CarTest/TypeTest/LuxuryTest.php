<?php
namespace Car\TestType;


use Car\Type\Luxury;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class LuxuryTest
 * @package Car\TestType
 */
class LuxuryTest extends TestCase
{
    /**
     * @covers Luxury::__construct
     */
    public function testIsTypeInterface()
    {
        $luxury = new Luxury();
        $this->AssertInstanceOf(TypeInterface::class, $luxury);
    }
}