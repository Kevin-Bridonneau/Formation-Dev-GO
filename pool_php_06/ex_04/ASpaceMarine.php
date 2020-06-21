<?php

include_once("IUnit.php");

abstract class ASpaceMarine implements IUnit
{
    public $name;
    public $hp = 0;
    public $ap = 0;

    public function __construct($name) 
    {
        if(gettype($name) == "string")
        {
            $this->name = $name ;
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
    
    public function equip($weapon=NULL)
    {

    }

    public function attack($unit)
    {
 
    }

    public function receiveDamage($damage)
    {

    }
    public function moveCloseTo($target)
    {

    }
    public function recoverAP()
    {

    }

}


?>