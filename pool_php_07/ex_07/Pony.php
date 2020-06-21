<?php

class Pony
{
    public $gender;
    public $name;
    public $color;

    public function __construct($gender,$name,$color)
    {
        $this->gender = $gender;
        $this->name = $name;
        $this->color = $color;
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
}



?>