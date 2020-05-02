<?php


namespace App\tests;

require_once __DIR__ . '/../src/autoload.php';

use App\CanCoke;
use App\Fridge;
use App\Shelf;

class TestTake extends Fridge
{
    public function testTakeBeverageOnEmptyFridge()
    {
        print "\033[32m Testing take method on empty fridge \33[0m". PHP_EOL;
        printf("Number of beverages on fridge: %d %s", $this->getNumberOfBeverages(), PHP_EOL);

        $beverage = new CanCoke();

        if ($this->takeBeverage($beverage)){
            print "Beverage taken".PHP_EOL;
        }else{
            print "Beverage couldn't be taken". PHP_EOL;
        }
        printf("Number of beverages on fridge: %d %s", $this->getNumberOfBeverages(), PHP_EOL);

    }
    public function testTakeBeverageOnFridgeWithBeverage()
    {
        print "\033[32m Testing take method on fridge with 1 beverage \33[0m". PHP_EOL;

        $beverage = new CanCoke();
        $this->putOnBeverage($beverage);
        printf("Fridge has %d beverage(s) %s", $this->getNumberOfBeverages(), PHP_EOL);

        if ($this->takeBeverage($beverage)){
            print "Beverage taken".PHP_EOL;
        }else{
            print "Beverage couldn't be taken". PHP_EOL;
        }
        printf("Number of beverages on fridge: %d %s", $this->getNumberOfBeverages(), PHP_EOL);

    }
}

$testTake = new TestTake();

$testTake->testTakeBeverageOnEmptyFridge();

$testTake->testTakeBeverageOnFridgeWithBeverage();