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
        $this->frenzy=false;
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

    public function eat($animal=NULL)
    {

        if((($animal != $this)&&(gettype($animal) == "object"))&&((get_class($animal) == "Animal")||(get_class($animal) == "Cat")||(get_class($animal) == "Canary")||(get_class($animal) == "Shark")))
        {
            echo $this->name." ate a ".$animal->type." named ".$animal->name.".\n";
            $this->frenzy = false;
            if(get_class($animal) == "Cat")
            {
                Animal::$animals--;
                Animal::$mammals--;
                $animal=NULL ; 
            }
            elseif(get_class($animal) == "Canary")
            {
                Animal::$animals--;
                Animal::$birds--;
                $animal=NULL ;
            }
            elseif(get_class($animal) == "Shark")
            {
                Animal::$animals--;
                Animal::$fishes--; 
                $animal=NULL ;
            }
            elseif(get_class($animal) == "Animal")
            {
                if(($animal->type) == "mammal")
                {
                    Animal::$animals--;
                    Animal::$mammals--;
                    $animal=NULL ;
                }
                elseif(($animal->type) == "fish")
                {
                    Animal::$animals--;
                    Animal::$fishes--;
                    $animal=NULL ;
                }
                elseif(($animal->type) == "bird")
                {
                    Animal::$animals--;
                    Animal::$birds--;
                    $animal=NULL ;
                }
            }
        }
        else
        {
            echo $this->name.": It's not worth my time.\n";
        }

    }

}

?>