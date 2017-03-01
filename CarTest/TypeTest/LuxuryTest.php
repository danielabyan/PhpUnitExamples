<?php
namespace Car\TestType;


use Car\Type\Luxury;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class LuxuryTest extends TestCase
{
    public function testIsTypeInterface()
    {
        $luxury = new Luxury();
        $this->AssertInstanceOf(TypeInterface::class, $luxury);
    }
}