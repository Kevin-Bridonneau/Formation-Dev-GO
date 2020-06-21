<?php


function my_order_class_name(...$obj)
{
    $array = array();
    foreach( $obj as $value)
    {
        if(strcmp(gettype($value), "NULL") == 0)
        {
            $array[0][0]= "NULL";
        }
        elseif(strcmp(gettype($value), "array") == 0)
        {
            $array[1][0]= "array";
        }
        elseif(strcmp(gettype($value), "double") == 0)
        {
            $array[2][0]= "double";
        }
        elseif(strcmp(gettype($value), "string") == 0)
        {
            $array[2][1]= "string";
        }
        elseif(strcmp(gettype($value), "boolean") == 0)
        {
            $array[3][0]= "bollean";
        }
        elseif(strcmp(gettype($value), "integer") == 0)
        {
            $array[3][1]= "integer";
        }
        elseif(strcmp(get_class($value), $value) == 0)
        {
            $array[3][2]= get_class($value);
        }


    }
    asort($array);
    return $array;
}

/*
class Myclass{};


$args = [
    true,
    76,
    false,
    12.5,
    //"Coucou !",
    [1, 2, 3],
    new MyClass(),
    //NULL
    ];


print_r(my_order_class_name(...$args));*/


?>