<?php
namespace Car\TestType;


use Car\Type\Economy;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class EconomyTest extends TestCase
{
    public function testIsTypeInterface()
    {
        $economy = new Economy();
        $this->AssertInstanceOf(TypeInterface::class, $economy);
    }
}