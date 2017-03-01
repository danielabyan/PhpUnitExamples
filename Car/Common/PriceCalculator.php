<?php
namespace Car\Common;

use Car\Size\SizeInterface;
use Car\Type\Economy;
use Car\Type\Family;
use Car\Type\Luxury;
use Car\Type\Sport;
use Car\Type\TypeInterface;

/**
 * Class PriceCalculator
 * @package Car\Common
 */
class PriceCalculator
{
    const ONE_PRICE_WEIGHT_EQUAL_PRICE = 1000;

    /** @var  SizeInterface */
    private $size;

    /** @var  TypeInterface */
    private $type;

    /**
     * PriceCalculator constructor.
     * @param SizeInterface $size
     * @param TypeInterface $type
     */
    public function __construct(SizeInterface $size, TypeInterface $type)
    {
        $this->size = $size;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function calculate(): int
    {
        $priceWeight = $this->getPriceWeightFromType() * self::ONE_PRICE_WEIGHT_EQUAL_PRICE;
        $priceWeight += $this->getPriceWeightFromSize();

        return $priceWeight;
    }

    /**
     * @return int
     */
    private function getPriceWeightFromSize(): int
    {

        $size = $this->size->getMaxSize();

        $priceWeightBySize = $size->getDepth() + $size->getHeight() + $size->getWidth();
        $priceWeightBySize *= 7;

        return $priceWeightBySize;
    }

    /**
     * @return int
     */
    private function getPriceWeightFromType(): int
    {
        $priceWeightByType = 0;

        $type = $this->type;
        if ($type instanceof Economy) {
            ++$priceWeightByType;
        } elseif ($type instanceof Family) {
            $priceWeightByType += 2;
        } elseif ($type instanceof Sport) {
            $priceWeightByType += 3;
        } elseif ($type instanceof Luxury) {
            $priceWeightByType += 4;
        }

        return $priceWeightByType;
    }
}