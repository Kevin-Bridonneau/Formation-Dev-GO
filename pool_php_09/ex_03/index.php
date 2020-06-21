<?php
    session_start();
    if($_GET["name"] != null)
    {
        $_SESSION['name'] = $_GET['name'];
        echo 'Hello ' . htmlspecialchars($_SESSION["name"]);
    }
    elseif($_SESSION["name"] === null)
    {
        echo 'Hello platypus';
    }
    else
    {
        echo 'Hello ' . htmlspecialchars($_SESSION["name"]);
    }
?>
