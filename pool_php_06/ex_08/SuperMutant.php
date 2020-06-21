<?php

include_once("AMonster.php");

class SuperMutant extends AMonster
{

    public static $count =1;
    public function __construct() 
    {
        $this->name = "SuperMutant #".(string)SuperMutant::$count;
        SuperMutant::$count++;
        $this->hp = 170;
        $this->ap = 20;
        $this->damage= 60;
        $this->apcost= 20;
        echo $this->name.": Roaarrr !\n";
    }

    public function __destruct()
    {
        echo $this->name.": Urgh !\n";
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
                if($this->hp <= 160)
                {
                    $this->hp += 10;
                }
            }
            else
            {
                $this->ap +=7;
                if($this->hp <= 160)
                {
                    $this->hp += 10;
                }
            } 

        }
    }
}


?>