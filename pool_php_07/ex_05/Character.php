<?php

include_once("IMovable.php");

class Character implements IMovable
{
    protected $name;
    protected $life;
    protected $agility;
    protected $strength;
    protected $wit;

    public const CLASSE = "Character";

    public function __construct($name)
    {
        $this->name = $name;
        $this->life = 50;
        $this->agility = 2;
        $this->strength = 2;
        $this->wit = 2;
    }

    public function __call($method, $args)
    {
        if(strcmp($method,"unsheathe") == 0)
        {
            $this->unsheathe();
        }
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function getLife()
    {
        return $this->life;
    }

    public function getAgility()
    {
        return $this->agility;
    }
    
    public function getStrength()
    {
        return $this->strength;
    }

    public function getWit()
    {
        return $this->wit;
    }

    public function getCLasse()
    {
        return Character::CLASS;
    }

    public function moveRight()
    {
        echo $this->name.": moves right.\n";
    }

    public function moveLeft()
    {
        echo $this->name.": moves left.\n";
    }

    public function moveUp()
    {
        echo $this->name.": moves up.\n";
    }

    public function moveDown()
    {
        echo $this->name.": moves down.\n";
    }

    protected function unsheathe()
    {
        echo $this->name.": unsheathes his weapon.\n";
        
    }
}


?>