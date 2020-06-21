<?php
    session_start();
    if(isset($_SESSION["user_data"]))
    {
        $user = $_SESSION["user_data"];
        echo "Hello ".$user["name"];
    }
    else
    {
        header("location:login.php");
        exit();
    }
?>