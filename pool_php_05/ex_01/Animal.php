<?php



class Animal
{
    const MAMMAL = 0;
    const FISH = 1;
    const BIRD = 2;

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
        }
        elseif(($type) == 1)
        {
            $this->type="fish";
        }
        elseif(($type) == 2)
        {
            $this->type="bird";
        }

        echo "My name is ".$this->name." and I am a ".$this->type."!\n";

        return true;
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



}







?>