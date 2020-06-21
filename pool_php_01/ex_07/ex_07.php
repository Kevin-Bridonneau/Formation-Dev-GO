<?php

function get_angry_dog(int $nbr)
{
    $chaine = "";
    for ($i = 0; $i < $nbr ; $i++)
    {
        $chaine = $chaine."woof";
    }
    return $chaine."\n";

}


?>