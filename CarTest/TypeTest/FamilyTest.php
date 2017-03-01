<?php
namespace Car\TestType;


use Car\Type\Family;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class FamilyTest extends TestCase
{
    public function testIsTypeInterface()
    {
        $family = new Family();
        $this->AssertInstanceOf(TypeInterface::class, $family);
    }
}