<?php

function my_swap(&$a,&$b)
{
    $varTemp = $a;
    $a = $b;
    $b = $varTemp;

}

?>