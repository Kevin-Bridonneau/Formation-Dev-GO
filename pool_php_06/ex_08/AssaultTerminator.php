<?php

include_once("ASpaceMarine.php");
include_once("PowerFist.php");

class AssaultTerminator extends ASpaceMarine
{
    public function __construct($name) 
    {
        $this->name = $name;
        $this->hp = 150;
        $this->ap = 30;
        $weapon = new PowerFist();
        $this->equip($weapon);
        echo $this->name." has teleported from space.\n";
        
    }

    public function __destruct()
    {
        echo "BOUUUMMMM ! ".$this->name." has exploded.\n";
    }


    public function receiveDamage($damage)
    {
        if($this->hp <= 0)
        {
            return false;
        }
        elseif(($damage/3 < 1 )&&($this->hp -1 >= 0))
        {
            $this->hp -= 1;
            if($this->hp <= 0)
            {
                echo "BOUUUMMMM ! ".$this->name." has exploded.\n";
            }
        }
        else
        {
            $this->hp = ($damage / 3);
            if($this->hp <= 0)
            {
                echo "BOUUUMMMM ! ".$this->name." has exploded.\n";
            }
        }
        
    }

}