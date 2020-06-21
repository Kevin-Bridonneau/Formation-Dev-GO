<?php
    $name = $_GET['name'];
    if($name != null)
    {
        setcookie('name', $name);
    }

    if(isset($_COOKIE['name']))
    {
        echo 'Hello ' .$_COOKIE["name"];
    }
    else
    {
        echo 'Hello platypus';
    }
?>