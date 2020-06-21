<?php

include_once("Animal.php");

class Shark extends Animal
{
    private $frenzy;

    public function __construct($name)
    {
        $this->name = $name;
        $this->legs = 0;
        $this->type = "fish";
        $this->frenzy=FALSE;
        Animal::$animals++;
        Animal::$fishes++;
        echo "My name is ".$this->name." and I am a ".$this->type."!\n";
        echo "A KILLER IS BORN!\n";
        return true;

    }

    public function smellBlood($blood)
    {
       $this->frenzy = $blood;

    }

    public function status()
    {
        if($this->frenzy)
        {
            echo $this->name." is smelling blood and wants to kill.\n";
        }
        else
        {
            echo $this->name." is swimming peacefully.\n";
        }
    }

}

?>