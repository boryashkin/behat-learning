<?php
/**
 * Created by PhpStorm.
 * User: boris
 * Date: 14.04.18
 * Time: 1:20
 */

namespace app\models;

class Basket implements \Countable
{
    private $shelf;
    private $totalPrice = 0;
    /**
     * @var array
     */
    private $storage = [];

    public function __construct(Shelf $shelf)
    {
        $this->shelf = $shelf;
    }

    public function addProduct($product)
    {
        if ($this->shelf->getPrice($product) === null) {
            throw new \Exception('Unknown product');
        }
        if (isset($this->storage[$product])) {
            $this->storage[$product]++;
        } else {
            $this->storage[$product] = 1;
        }
        $this->totalPrice += $this->shelf->getPrice($product);
    }

    public function getTotalPrice()
    {
        return $this->totalPrice + $this->getVatPrice() + $this->getDeliveryPrice();
    }

    /** @inheritdoc */
    public function count()
    {
        return count($this->storage);
    }

    private function getVatPrice()
    {
        return $this->totalPrice * 0.2;
    }

    private function getDeliveryPrice()
    {
        return $this->totalPrice > 10 ? 2.0 : 3.0;
    }
}
