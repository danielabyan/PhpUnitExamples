<?php
namespace Car\TestType;


use Car\Type\Economy;
use Car\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class EconomyTest
 * @package Car\TestType
 */
class EconomyTest extends TestCase
{
    public function testIsTypeInterface()
    {
        $economy = new Economy();
        $this->AssertInstanceOf(TypeInterface::class, $economy);
    }
}