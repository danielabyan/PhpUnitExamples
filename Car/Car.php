<?php
declare(strict_types = 1);

namespace Car;

use Car\Common\PriceCalculator;
use Car\Size\SizeInterface;
use Car\Type\TypeInterface;

/**
 * Class Car
 * @package Car
 */
final class Car
{
    const BRAND_NAME_SYMBOLS_COUNT = 50;

    /**
     * @var string
     */
    private $brandName;

    /**
     * @var TypeInterface
     */
    private $type;

    /**
     * @var SizeInterface
     */
    private $size;

    /**
     * Car constructor.
     * @param string $brandName
     * @param TypeInterface $type
     * @param SizeInterface $size
     */
    public function __construct(string $brandName, TypeInterface $type, SizeInterface $size)
    {
        $this->validateBrandName($brandName);
        $this->brandName = $brandName;
        $this->type = $type;
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getBrandName(): string
    {
        return $this->brandName;
    }

    /**
     * @return TypeInterface
     */
    public function getType(): TypeInterface
    {
        return $this->type;
    }

    /**
     * @return SizeInterface
     */
    public function getSize(): SizeInterface
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        $priceCalculator = new PriceCalculator($this->size, $this->type);
        return $priceCalculator->calculate();
    }

    /**
     * @param string $brandName
     * @throws InvalidArgumentException
     */
    private function validateBrandName(string $brandName)
    {
        if (empty($brandName)) {
            throw new InvalidArgumentException("{Brand name} can't be empty");
        } elseif (strlen($brandName) > self::BRAND_NAME_SYMBOLS_COUNT) {
            throw new InvalidArgumentException("{Brand name} is longer than " . self::BRAND_NAME_SYMBOLS_COUNT . " characters");
        }
    }

}