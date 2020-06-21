<?php

if(isset($_COOKIE['user_data'])) 
{
    $user_data = $_COOKIE['user_data'];
    setcookie('user_data' , $user_data, time()-3600);
    header("location:login.php");
    exit();
}
else
{
    session_start();

    if(isset($_SESSION["user_data"]))
    {
        session_destroy(); 
        header("location:login.php");
        exit();
    }
    else
    {
        header("location:login.php");
        exit();
    }
}

?>
