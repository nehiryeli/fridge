<?php

namespace App;

class Fridge
{
    const NUMBER_OF_SHELVES = 3;

    private $shelves;
    private $isDoorOpen;
    private $numberOfShelves;

    /**
     * Fridge constructor.
     * @param int $numberOfShelves
     */
    public function __construct (int $numberOfShelves = 0)
    {

        $this->initializeShelves($numberOfShelves);
    }

    /**
     * @return \ArrayObject
     */
    public function getShelves()
    {
        return $this->shelves;
    }

    /**
     * @param Shelf shelf
     */
    public function setShelves(Shelf $shelf)
    {
        $this->shelves[] = $shelf;
    }

    /**
     * @return bool
     */
    public function getIsDoorOpen() :bool
    {
        return $this->isDoorOpen;
    }

    /**
     * @param mixed $isDoorOpen
     */
    public function setIsDoorOpen($isDoorOpen): void
    {
        $this->isDoorOpen = $isDoorOpen;
    }


    private function initializeShelves(int $numberOfShelves)
    {
        // set number of shelves of the fridge
        $this->numberOfShelves = $numberOfShelves ? $numberOfShelves : self::NUMBER_OF_SHELVES;

        // create shelves
        for($i=0; $i < $this->numberOfShelves; $i++){
            $shelf = new Shelf();
            $this->setShelves($shelf);
        }
    }

    public function putOnBeverage(BeverageInterface $beverage)
    {
        // open the fridge door
        $this->setIsDoorOpen(true);
        /** @var Shelf $shelf */
        foreach($this->shelves as $shelf){
            if($shelf->putOnBeverage($beverage)){
                // close the fridge door
                $this->setIsDoorOpen(false);
                return true;
            }

        }
        // close the fridge door
        $this->setIsDoorOpen(false);
        return false;
    }

    public function takeBeverage()
    {
        // open the fridge door
        $this->setIsDoorOpen(true);
        $taken = false;
        /** @var Shelf $shelf */
        foreach($this->shelves as $shelf){
            if($shelf->takeBeverage()){
                $taken = true;
                break;
            }
        }

        // close the fridge door
        $this->setIsDoorOpen(false);
        return $taken;
    }

    public function getBeverages()
    {
        $beveragesOnShelves = new \ArrayObject();
        $shelves = $this->getShelves();
        /** @var Shelf $shelf */
        foreach ($shelves as $shelf){
             $beveragesOnShelves[] = $shelf->getBeverages();
        }
        return $beveragesOnShelves;
    }

    public function getNumberOfBeverages()
    {
        $beveragesOnShelves = $this->getBeverages();
        $total = 0;
        foreach($beveragesOnShelves as $beveragesOnShelf){
            $total += count($beveragesOnShelf);
        }
        return $total;
    }


}