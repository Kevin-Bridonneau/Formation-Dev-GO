<?php

include_once("ASpaceMarine.php");
include_once("PlasmaRifle.php");

class TacticalMarine extends ASpaceMarine
{
    public function __construct($name) 
    {
        $this->name = $name;
        $this->hp = 100;
        $this->ap = 20;
        $weapon = new PlasmaRifle();
        $this->equip($weapon);
        echo $this->name." on duty.\n";
        
    }

    public function receiveDamage($damage)
    {
        if($this->hp <= 0)
        {
            return false;
        }
        else
        {
            $this->hp -= $damage;
            if($this->hp <= 0)
            {
                echo $this->name." the Tactical Marine has fallen !\n";
            }
        }


    }

    public function recoverAP()
    {
        if($this->hp <= 0)
        {
            return false;
        }
        else
        {
            if($this->ap + 12 >= 50)
            {
                $this->ap = 50;
            }
            else $this->ap +=12;
        }
    }
}
