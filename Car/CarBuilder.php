<?php
namespace Car;


use Car\Size\SizeInterface;
use Car\Type\TypeInterface;

/**
 * Class CarBuilder
 * @package Car
 */
class CarBuilder
{
    /** @var Car */
    private $car;

    /** @var string */
    private $brandName;

    /** @var SizeInterface */
    private $size;

    /** @var  TypeInterface */
    private $type;

    /**
     * @param string $brandName
     */
    public function setBrandName(string $brandName)
    {
        $this->brandName = $brandName;
    }

    /**
     * @param SizeInterface $size
     */
    public function setSize(SizeInterface $size)
    {
        $this->size = $size;
    }

    /**
     * @param TypeInterface $type
     */
    public function setType(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function build()
    {
        $car = new Car(
            $this->brandName,
            $this->type,
            $this->size
        );

        $this->car = $car;

        return true;
    }

    /**
     * @return Car
     */
    public function getCar(): Car
    {
        return $this->car;
    }
}