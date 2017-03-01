<?php
namespace Car\Size;

use Car\Common\Size3D;

/**
 * Class Minivan
 * @package Car\Size
 */
class Minivan implements SizeInterface
{
    /**
     * @var Size3D
     */
    private $minSize;

    /**
     * @var Size3D
     */
    private $maxSize;

    /**
     * Compact constructor.
     */
    public function __construct()
    {
        $this->minSize = new Size3D(150, 150, 100);
        $this->maxSize = new Size3D(250, 250, 200);
    }

    /**
     * @return Size3D
     */
    public function getMinSize(): Size3D
    {
        return $this->minSize;
    }

    /**
     * @return Size3D
     */
    public function getMaxSize(): Size3D
    {
        return $this->maxSize;
    }
}