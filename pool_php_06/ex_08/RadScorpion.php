<?php

include_once("AMonster.php");

class RadScorpion extends AMonster
{
    public static $count =1;
    public function __construct() 
    {
        $this->name = "RadScorpion #".(string)Radscorpion::$count;
        Radscorpion::$count++;
        $this->hp = 80;
        $this->ap = 50;
        $this->damage=25;
        $this->apcost=8;
        echo $this->name.": Crrr !\n";
    }

    public function __destruct()
    {
        echo $this->name.": SPROTCH !\n";
    }

    public function attack($unit)
    {
        if($this->hp <= 0)
        {
            return false;
        }
        elseif((gettype($unit) == "object")&&(get_parent_class($unit) != "IUnit"))
        {
            echo "Error in AMonster. Parameter is not an IUnit.";
        }
        elseif($this->position != $unit)
        {
            echo $this->name.": I’m too far away from ".$unit->name.".\n";
        }
        elseif($this->ap >= $this->apcost)
        {
            $this->ap -= $this->apcost;
            echo $this->name."attacks ".$unit->name.".\n";
            if(get_class($unit)!= "AssaultTerminator")
            {
                $unit->receiveDamage(($this->damage) * 2);
            }
            else $unit->receiveDamage($this->damage);
        }
    }
}


?>