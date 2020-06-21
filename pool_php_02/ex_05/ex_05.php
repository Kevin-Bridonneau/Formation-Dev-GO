<?php



$map =array();

function my_add_elem_map($key,$value,&$map)
{
    $map[$key] = $value;
    return $map;
}

function my_modify_elem_map($key, $value,&$map)
{
    $map[$key] = $value;
    return $map;
}
function my_delete_elem_map($key,&$map)
{
    unset($map[$key]);
    return $map;
}
function my_is_elem_valid($key,$value,&$map)
{
    if(($key == "")||($value == "")||($map == ""))
    {
        echo "You have to give good parameters.\n";
        exit;
    }
    if (array_key_exists($key,$map))
    {
        if(strcmp($map[$key],$value) == 0)
        {
            return true;
        }
        else return false;
    }
    else return false;
}



?>