<?php
namespace App;
class Shelf implements ShelfInterface
{
     const MAX_CAPACITY = 20;
    
    /**
     * Capacity of the shelve
     * @var int
     */
    private $capacity;
    private $beverages;

    /**
     * Shelf constructor.
     */
    public function __construct()
    {
        $this->beverages = new \ArrayObject();
        $this->capacity = self::MAX_CAPACITY;
    }


    public function setCapacity(int $capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function takeBeverage()
    {
        // check if shelf has a beverage since all products are the same no it doesn't matter which one to take
        if ($this->beverages->count() > 0){
            $this->beverages->offsetUnset(0);
            return true;
        } else{
            return false;
        }
    }

    public function putOnBeverage(BeverageInterface $beverage)
    {
        // check if shelf has space and put it on the shelf
        if ($this->beverages->count() < $this->capacity){
            $this->beverages->append($beverage);
            return true;
        } else{
            return false;
        }
    }

    /**
     * @return \ArrayObject
     */
    public function getBeverages(): \ArrayObject
    {
        return $this->beverages;
    }


}
