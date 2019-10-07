<?php
/**
 * Created by PhpStorm.
 * User: toure
 * Date: 16/09/2019
 * Time: 14:14
 */

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class PropertySearch
{
    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $minSurface;

    /**
     * @return int|null
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @var ArrayCollection
     */

    private $entityOption;

    public function __construct()
    {
        $this->entityOption = new ArrayCollection();
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     * @return PropertySearch
     */
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getEntityOption(): ArrayCollection
    {
        return $this->entityOption;
    }

    /**
     * @param ArrayCollection $entityOption
     */
    public function setEntityOption(ArrayCollection $entityOption)
    {
        $this->entityOption = $entityOption;
    }
}