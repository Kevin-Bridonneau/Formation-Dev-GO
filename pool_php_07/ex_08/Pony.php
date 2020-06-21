<?php

class Pony
{
    private $gender;
    private $name;
    private $color;

    public function __construct($gender,$name,$color)
    {
        $this->gender = $gender;
        $this->name = $name;
        $this->color = $color;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function __destruct()
    {
        echo "I'm a dead pony.\n";
    }

    public function __call($method, $args) 
    {
        if(!method_exists($this,$method))
        {
            echo "I don't know what to do...\n";
        }

    }

    public function __toString()
    {
      return "Don't worry, I'm a pony!\n";
    }

    public function speak()
    {
        echo "Hiii hiii hiii\n";
    }

    public function __set($var, $value)
    {
        if(($var == "name")||($var == "gender")||($var == "color"))
        {
            echo "It's not right to set a private attribute!\n";
            $this->$var = $value;
            return $this->$var;
        }
        else 
        {
            echo "There is no attribute: ".$var.".\n";
        }
    }

    public function __get($var)
    {
        if(($var == "name")||($var == "gender")||($var == "color"))
        {
            echo "It's not right to get a private attribute!\n";
            return $this->$var;
        }
        else 
        {
            echo "There is no attribute: ".$var.".\n";
        }
    }
}



?>