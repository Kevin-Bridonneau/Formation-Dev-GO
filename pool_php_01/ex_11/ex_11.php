<?php

function my_print_args(...$arr) 
{
    array_shift($arr);
    foreach ($arr as $n) 
    {
       echo $n."\n";
    }
}
my_print_args(...$argv);

?>