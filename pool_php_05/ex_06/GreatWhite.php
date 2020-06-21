<?php

include_once("Shark.php");

class GreatWhite extends Shark
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




    public function eat($animal=NULL)
    {
        if((gettype($animal) == "object")&&(get_class($animal) == "Canary"))
        {
            echo $this->name.": Next time you try to give me that to eat, I'll eat you instead.\n";    
        }
        elseif((($animal != $this)&&(gettype($animal) == "object"))&&((get_class($animal) == "Animal")||(get_class($animal) == "Cat")||(get_class($animal) == "Shark")||(get_class($animal) == "BlueShark")||(get_class($animal) == "GreatWhite")))
        {
            if((get_class($animal) == "Shark")||(get_class($animal) == "BlueShark")||(get_class($animal) == "GreatWhite"))
            {
                echo $this->name.": The best meal one could wish for.\n";
            }
            echo $this->name." ate a ".$animal->type." named ".$animal->name.".\n";

                parent::smellBlood(false);
                Animal::$animals--;
                Animal::$fishes--; 
                $animal=NULL ;
        }
        else
        {
            echo $this->name.": It's not worth my time.\n";
        }

    }

}

?>