<?php
namespace Car\TestType;


use Car\Type\Family;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class FamilyTest
 * @package Car\TestType
 */
class FamilyTest extends TestCase
{
    /**
     * @covers Family::__construct
     */
    public function testIsTypeInterface()
    {
        $family = new Family();
        $this->AssertInstanceOf(TypeInterface::class, $family);
    }
}