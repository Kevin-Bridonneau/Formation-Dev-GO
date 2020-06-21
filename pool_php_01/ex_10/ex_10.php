<?php
function my_get_args(...$numbers) 
{
    $array = [];
    foreach ($numbers as $n) 
    {
        array_push($array,$n);
    }
    return $array;
}

?>