<?php
namespace Car\Size;

use Car\Common\Size3D;

/**
 * Interface SizeInterface
 * @package Car\Size
 */
interface SizeInterface
{
    /**
     * @return Size3D
     */
    public function getMinSize(): Size3D;

    /**
     * @return Size3D
     */
    public function getMaxSize(): Size3D;
}