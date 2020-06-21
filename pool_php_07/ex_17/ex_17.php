<?php

class Apothecary
{
    public static function heal($soldier)
    {
        if(is_subclass_of($soldier, "Imperium")  || get_class($soldier) == "Imperium")
        {
            echo "No servant of the Emperor shall fall if I can help it.\n";
        }
        else
        {
            echo "The enemies of the Emperor shall be destroyed!\n";   
        }
    }
}


?>