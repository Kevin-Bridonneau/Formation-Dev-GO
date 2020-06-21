<?php

function autoloader($class) 
{
    include $class.'.class.php'; 
}

spl_autoload_register('autoloader');

?>