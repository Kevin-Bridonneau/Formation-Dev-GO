<?php

include_once("Animal.php");

class Canary extends Animal
{
    private $eggs;

    public function __construct($name,$color=NULL)
    {
        $this->name = $name;
        $this->legs = 2;
        $this->type = "bird";
        $this->eggs = 0;
        Animal::$animals++;
        Animal::$fishes++;
        echo "My name is ".$this->name." and I am a ".$this->type."!\n";
        echo "Yellow and smart ? Here I am!\n";
        return true;

    }



    public function getEggsCount()
    {
       return $this->eggs;

    }
    
    public function layEgg()
    {
        $this->eggs++;
    }

}

?>