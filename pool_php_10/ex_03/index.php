<?php
    session_start();
    if(isset($_SESSION["user_data"]))
    {
        $user = $_SESSION["user_data"];
        echo "Hello ".$user["name"];
        ?>
        <br>
        <a href="logout.php">Logout</a>
        <?php      
    }
    else
    {
        header("location:login.php");
        exit();
    }
?>