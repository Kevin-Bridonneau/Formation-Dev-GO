<?php

class Character
{
    private $name;
    private $strength;
    private $magic;
    private $intelligence;
    private $life;

    public static $count = 1;

    public function __construct($name = NULL)
    {
        $i = "Character ".Character::$count;
        if(is_null($name))
        {
            $this->name = $i;
            Character::$count++;
        }
        else
        {
            $this->name = $name;
        }

        $this->strength = 0;
        $this->magic = 0;
        $this->intelligence = 0;
        $this->life = 100;
    }

    public function __toString()
    {
      return "My name is ".$this->name.".\n";
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function getStrength()
    {
        return $this->strength;
    }

    protected function getMagic()
    {
        return $this->magic;
    }

    protected function getIntelligence()
    {
        return $this->intelligence;
    }

    protected function getLife()
    {
        return $this->life;
    }
}

?>