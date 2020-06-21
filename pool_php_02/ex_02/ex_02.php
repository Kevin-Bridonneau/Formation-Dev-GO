<?php


function my_create_map(...$array)
{
    $newarray = array();
    foreach ($array as $key => $value)
    {
        if(count($value) > 2 )
        {
            echo "The given arguments aren’t valid.";
            return NULL;
        }
        $newarray[$value[0]] = $value[1];
        
        
    }
    return $newarray;

}

?>