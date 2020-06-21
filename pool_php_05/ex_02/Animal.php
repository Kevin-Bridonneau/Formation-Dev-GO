<?php



class Animal
{
    const MAMMAL = 0;
    const FISH = 1;
    const BIRD = 2;

    public static $animals=0;
    public static $mammals=0;
    public static $fishes=0;
    public static $birds=0;


    public $name;
    public $legs;
    public $type;


    public function __construct($name,$legs,$type)
    {
    
        $this->name = $name;
        $this->legs = $legs;
        if(($type) == 0)
        {
            $this->type="mammal";
            Animal::$animals++;
            Animal::$mammals++;
        }
        elseif(($type) == 1)
        {
            $this->type="fish";
            Animal::$animals++;
            Animal::$fishes++;
        }
        elseif(($type) == 2)
        {
            $this->type="bird";
            Animal::$animals++;
            Animal::$birds++;
        }


        echo "My name is ".$this->name." and I am a ".$this->type."!\n";
        return true;
    }

    public function __destruct()
    {
        if(($this->type) == "mammal")
        {
            Animal::$animals--;
            Animal::$mammals--;
        }
        elseif(($this->type) == "fish")
        {
            Animal::$animals--;
            Animal::$fishes--;
        }
        elseif(($this->type) == "bird")
        {
            Animal::$animals--;
            Animal::$birds--;
        }
    }

    public function getName()
    {
        return $this->name;
    }
    public function getLegs()
    {
        return $this->legs;
    }

    public function getType()
    {
        return $this->type;
    }

    public static function getNumberOfAnimalsAlive()
    {
        if((Animal::$animals) === 0)
        {
            echo "There is currently ".Animal::$animals." animals alive in our world.\n";
            return Animal::$animals;
        }
        elseif((Animal::$animals) === 1)
        {
            echo "There is currently ".Animal::$animals." animal alive in our world.\n";
            return Animal::$animals;
        }
        else
        {
            echo "There are currently ".Animal::$animals." animals alive in our world.\n";
            return Animal::$animals;
        }

    }

    public static function getNumberOfMammals()
    {
        
        if((Animal::$mammals) === 1)
        {
            echo "There is currently ".Animal::$mammals." mammal alive in our world.\n";
            return Animal::$mammals;
        }
        else
        {
            echo "There are currently ".Animal::$mammals." mammals alive in our world.\n";
            return Animal::$mammals;
        }

    }

    public static function getNumberOfBirds()
    {
        
        if((Animal::$birds) === 0)
        {
            echo "There is currently ".Animal::$birds." birds alive in our world.\n";
            return Animal::$birds;
        }
        elseif((Animal::$birds) === 1)
        {
            echo "There is currently ".Animal::$birds." bird alive in our world.\n";
            return Animal::$birds;
        }
        else
        {
            echo "There are currently ".Animal::$birds." birds alive in our world.\n";
            return Animal::$birds;
        }

    }

    public static function getNumberOfFishes()
    {
        if((Animal::$fishes) < 2 )
        {
            echo "There is currently ".Animal::$fishes." fish alive in our world.\n";
            return Animal::$fishes;
        }
        else
        {
            echo "There are currently ".Animal::$fishes." fishes alive in our world.\n";
            return Animal::$fishes;
        }

    }



}







?>