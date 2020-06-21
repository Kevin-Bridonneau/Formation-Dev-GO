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
            $user_data = $_SESSION["user_data"];
            echo "Hello ".$user_data["name"];     
        }
        else
        {
            header("location:login.php");
        }
    }


?>
<br>
<a href="logout.php">Logout</a>
<br>
<a href="modify_account.php">Settings</a>
<?php

    if(isset($user_data["is_admin"]))
    {
        if($user_data["is_admin"])
        {
?>
        <br>
        <a href="admin.php">Admin settings</a>
<?php
        }
    }
?>