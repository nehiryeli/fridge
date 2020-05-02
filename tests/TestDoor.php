<?php


namespace App\tests;
require_once __DIR__ . '/../src/autoload.php';

use App\Fridge;

class TestDoor extends Fridge
{
    public function openFridgeDoor()
    {
        print "\033[32m Opening the fridge door \33[0m". PHP_EOL;

        print sprintf("opening the door %s", PHP_EOL);
        $this->setIsDoorOpen(true);
        print sprintf("Is it open: %d %s", $this->getIsDoorOpen(),PHP_EOL);

    }

    public function closeFridgeDoor()
    {
        print "\033[32m Closing the fridge door  \33[0m". PHP_EOL;

        print sprintf("closing the door %s", PHP_EOL);
        $this->setIsDoorOpen(false);
        print sprintf("Is it open: %d %s", $this->getIsDoorOpen(),PHP_EOL);
    }
}

$testDoor = new TestDoor();

// check if fridge door can be opened
$testDoor->openFridgeDoor();

// check if fridge door can be closed
$testDoor->closeFridgeDoor();