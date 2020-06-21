<?php

include_once("Animal.php");

class Cat extends Animal
{
    private $color;

    public function __construct($name,$color=NULL)
    {
        $this->name = $name;
        $this->legs = 4;
        $this->type = "mammal";
        if(is_null($color))
        {
            $this->color ="grey";
            
        }
        else $this->color = $color;
        Animal::$animals++;
        Animal::$mammals++;
        echo "My name is ".$this->name." and I am a ".$this->type."!\n";
        echo $this->name.": MEEEOOWWWW\n";
        return true;

    }

    public function meow()
    {
       echo $this->name." the ".$this->color." kitty is meowing.\n";

    }

    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        if(is_null($color))
        {
            $this->color ="grey";
            
        }
        else $this->color = $color;
    }


}

?>