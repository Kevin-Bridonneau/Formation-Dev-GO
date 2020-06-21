<?php
//default name “platypus”
if($_GET["name"] === null)
{
    echo 'Hello platypus';
}
else
{
    echo 'Hello ' . htmlspecialchars($_GET["name"]);
}
?>