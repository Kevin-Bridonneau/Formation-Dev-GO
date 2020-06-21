<?php

include_once("Shark.php");

class BlueShark extends Shark
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
        if((($animal != $this)&&(gettype($animal) == "object"))&&($animal->type == "fish"))
        {
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