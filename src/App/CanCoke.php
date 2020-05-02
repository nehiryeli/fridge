<?php

namespace App;

use App\BeverageInterface;

class CanCoke implements BeverageInterface
{
    private $size = "33ml";
    public function getSize()
    {
        return $this->size;
    }
}