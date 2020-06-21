<?php

include_once("IUnit.php");

abstract class AMonster implements IUnit
{
    public $name;
    public $hp = 0;
    public $ap = 0;
    public $damage = 0;
    public $apcost = 0;
    public $melee =true;

    public $position =NULL;


    public function __construct($name) 
    {
        if(gettype($name) == "string")
        {
            $this->name = $name;
        }
    }
    

    public function getName()
    {
        return $this->name;
    }
    public function getHp()
    {
        return $this->hp;       
    }
    public function getAp()
    {
        return $this->ap;      
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function getApcost()
    {
        return $this->apcost;
    }
 
    public function equip($weapon=NULL)
    {
        if($this->hp <= 0)
        {
            return false;
        }
        else echo "Monsters are proud and fight with their own bodies.\n";
    }

    public function attack($unit)
    {

        if($this->hp <= 0)
        {
            return false;
        }
        else
        {
            if ($unit instanceof IUnit)
            {  
                if($this->position != $unit)
                {
                    echo $this->name.": I'm too far away from ".$unit->name.".\n";
                }
                elseif($this->ap >= $this->apcost)
                {
                    $this->ap -= $this->apcost;
                    echo $this->name." attacks ".$unit->name.".\n";
                    $unit->receiveDamage($this->damage);
                }
            }
            else
            {
                throw new Exception("Error in AMonster. Parameter is not an IUnit.");
            }
        }

    }

    public function receiveDamage($damage)
    {
        $this->hp -= $damage;
        if($this->hp <= 0)
        {
            return false;
        }
    }
    public function moveCloseTo($target)
    {
        if($this->hp <= 0)
        {
            return false;
        }
        elseif(($this->position != $target)&&($this != $target ))
        {
                if ($target instanceof IUnit)
                { 
                    $this->position = $target;
                    echo $this->name." is moving closer to ".$target->name.".\n";
                }
                else
                {
                    throw new Exception("Error in AMonster. Parameter is not an IUnit.");

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
            if($this->ap + 7 >= 50)
            {
                $this->ap = 50;
            }
            else $this->ap +=7;
        }
    }
}


?>