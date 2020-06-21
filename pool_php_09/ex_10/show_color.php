<?php 
if(isset($_COOKIE["background_color"]))
{
    $color = $_COOKIE["background_color"];
    if($color != "white" && $color != "black" && $color != "red" && $color != "blue")
    {
        header("location:set_color.php?color=invalid");
    }
    else
    {
        echo '<body style="background-color:'.$color.'">';
    }
}
?>