<?php

    if(isset($_COOKIE['user_data'])) 
    {
        $user_data = unserialize($_COOKIE['user_data']);
        echo "Hello ".$user_data["name"];
    }
    else
    {
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
    }

?>
<br>
<a href="logout.php">Logout</a>