<?php

include_once("IUnit.php");

abstract class ASpaceMarine implements IUnit
{
    public $name;
    public $hp = 0;
    public $ap = 0;
    public $weapon = NULL;
    public $position =NULL;

    public function __construct($name=NULL) 
    {
        if(gettype($name) == "string")
        {
            $this->name = $name;
        }
    }
    

    public function getWeapon()
    {
        return $this->weapon;
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
    
    public function equip($weapon=NULL)
    {
        if($this->hp <= 0)
        {
            return false;
        }
        else
        {
            if (gettype($weapon)=="object"&&get_parent_class($weapon) == "AWeapon")
            {  
                if(is_null($weapon->owner))
                {
                    $this->weapon = $weapon;
                    echo $this->name." has been equipped with a ".$weapon->name.".\n";
                }
            }
            else
            {
                throw new Exception("Error in ASpaceMarine. Parameter is not an IUnit.");
            }
        }

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
                    if(is_null($this->weapon))
                    {
                        echo $this->name.": Hey, this is crazy. I'm not going to fight this empty handed.\n";
                    }
                    elseif(($this->position != $unit)&&gettype($this->weapon)=="object"&&(($this->weapon->melee) == true))
                    {
                        echo $this->name.": I'm too far away from ".$unit->name.".\n";
                    }
                    elseif($this->ap >= $this->weapon->apcost)
                    {
                        $this->ap -= $this->weapon->apcost;
                        echo $this->name." attacks ".$unit->name." whith a ".$this->weapon->name.".\n";
                        $unit->receiveDamage($this->weapon->damage);
                    }
                }
                else
                {
                    throw new Exception("Error in ASpaceMarine. Parameter is not an IUnit.");
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
        elseif($target instanceof IUnit)
        {
                if (($this->position != $target)&&($this != $target ))
                { 
                    $this->position = $target;
                    echo $this->name." is moving closer to ".$target->name.".\n";
                }
                
        }
        else
        {
             throw new Exception("Error in ASpaceMarine. Parameter is not an IUnit.");

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
            if($this->ap + 9 >= 50)
            {
                $this->ap = 50;
            }
            else $this->ap +=9;
        }
    }

}


?>