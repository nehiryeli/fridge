<?php


namespace App;

interface ShelfInterface
{

    /**
     * @param int $capacity
     * @return mixed
     */
    public function setCapacity(int $capacity);

    /**
     * @return int
     */
    public function getCapacity() :int;

    public function takeBeverage();
    public function putOnBeverage(BeverageInterface $beverage);

}