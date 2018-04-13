<?php
/**
 * Created by PhpStorm.
 * User: boris
 * Date: 14.04.18
 * Time: 1:19
 */

namespace app\models;

class Shelf
{
    /**
     * @var array
     */
    private $pricing;

    public function setProductPrice($product, $price)
    {
        $this->pricing[$product] = $price;
    }

    public function getPricing()
    {
        return $this->pricing;
    }

    public function getPrice($product)
    {
        return isset($this->pricing[$product]) ? $this->pricing[$product] : null;
    }
}
