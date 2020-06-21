<?php

function my_division_modulo($fistNumber,$operChar, $secondNumber)
{
    if(($operChar !== "/")||(!$fistNumber)||(!$secondNumber))
    {
        throw new Exception("The given arguments aren't good.\n");
        exit;
    }
    else
    {
        $a = $fistNumber / $secondNumber;
        $b = $fistNumber % $secondNumber;
        return $a;
    }
}



?>