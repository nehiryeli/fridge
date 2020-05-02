<?php


namespace App\tests;

use App\CanCoke;
use App\Fridge;
use App\Shelf;

require_once __DIR__ . '/../src/autoload.php';
class TestPutOnFridge extends Fridge
{
    public function testPutOnFridge()
    {
        print "\033[32m Testing put on feature on fridge \33[0m". PHP_EOL;

        $beverage = new CanCoke();
        printf("Fridge has %d beverage(s) %s", $this->getNumberOfBeverages(), PHP_EOL);
        $this->putOnBeverage($beverage);
        printf("Fridge has %d beverage(s) after a beverage put on %s", $this->getNumberOfBeverages(), PHP_EOL);

    }

    public function testPutOnOnFullFridge(){
        print "\e[32m Testing put on feature on full fridge \e[0m". PHP_EOL;

        // full up the fridge
        $beverage = new CanCoke();

        for ($i=0; $i < self::NUMBER_OF_SHELVES * Shelf::MAX_CAPACITY; $i++){
            $this->putOnBeverage($beverage);
        }
        printf("Number of beverages in fridge: %d %s", $this->getNumberOfBeverages(),PHP_EOL);

        if($this->putOnBeverage($beverage)){
            printf("\e[32m Put on success even fridge is full \e[0m");
        }else{
            printf("\e[31m Put on failed due fridge is full \e[0m");

        }
    }
}

$testPutOnFridge = new TestPutOnFridge();
$testPutOnFridge->testPutOnFridge();
$testPutOnFridge->testPutOnOnFullFridge();