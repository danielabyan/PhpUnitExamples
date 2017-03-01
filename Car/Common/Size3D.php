<?php
namespace Car\Common;

/**
 * Class Size3D
 * @package Car\Common
 */
class Size3D
{
    /** @var int */
    private $x;

    /** @var int */
    private $y;

    /** @var int */
    private $z;

    /**
     * Size3D constructor.
     * @param int $x
     * @param int $y
     * @param int $z
     */
    public function __construct(int $x, int $y, int $z)
    {
        $sizes = func_get_args();
        for ($i = 0; $i < 3; $i++) {
            $this->validateSize($sizes[$i]);
        }

        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->z;
    }

    /**
     * @param int $size
     */
    private function validateSize(int $size)
    {
        if (0 === $size) {
            throw new InvalidArgumentException("{Size} can't be zero");
        } else {
            if ($size < 0) {
                throw new InvalidArgumentException("{Size} can't be negative number");
            }
        }
    }
}