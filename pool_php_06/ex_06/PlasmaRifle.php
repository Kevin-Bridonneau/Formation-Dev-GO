<?php

include_once("AWeapon.php");

class PlasmaRifle extends AWeapon
{
    public $owner;
    public function __construct() 
    {
        $this->name = "Plasma Rifle";
        $this->apcost = 5;
        $this->damage = 21;
        $this->melee = false;
    }



    public  function attack()
    {
        echo "PIOU\n";
    }
}


?>