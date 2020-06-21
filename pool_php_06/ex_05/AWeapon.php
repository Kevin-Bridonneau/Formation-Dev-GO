<?php



abstract class AWeapon 
{
    public $name;
    public $apcost;
    public $damage;
    public $melee = false;


    function __construct($name,$apcost,$damage)
    {

                if (is_string($name) && is_int($apcost) && is_int($damage))
                {  
                    $this->name = $name;
                    $this->apcost = $apcost;
                    $this->damage = $damage;
                }
                else
                {
                    throw new Exception("Error in AWeapon constructor. Bad parameters.");
                }
        

    }

    

    public function getName()
    {
        return $this->name;
    }
    public function getApcost()
    {
        return $this->apcost;       
    }
    public function getDamage()
    {
        return $this->damage;      
    }

    public function isMelee()
    {
        return $this->melee;
    }

    public abstract function attack();

}


?>