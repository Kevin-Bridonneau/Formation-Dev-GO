<?php

include_once("ex_15.php");

class Scanner
{
    public function scan($soldier)
    {
        if($soldier->getNamespace() == "Imperium")
        {
            echo "Praise be, Emperor, Lord.\n";
        }
        else
        {
            echo "Xenos spotted.\n";   
        }
    }
}

?>