<?php

include_once("AWeapon.php");

class PowerFist extends AWeapon
{
        public $owner;
        public function __construct() 
        {

                $this->name = "Power Fist";
                $this->apcost = 8;
                $this->damage = 50;
                $this->melee = true;
            
        }
    
    
    
        public  function attack()
        {
            echo "SBAM\n";
        }
    
}

?>