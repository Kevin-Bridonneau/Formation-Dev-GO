<?php

define("ERROR_LOG_FILE","./log");
function connect_db($host, $username, $passwd, $port, $db)
{
    try
    {
        $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port.';charset=utf8', $username, $passwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $Exception)
    {   
        $erreurfile = ERROR_LOG_FILE;
        error_log($Exception->getMessage()."\n", 3, $erreurfile );
        die('PDO ERROR: ' . $Exception->getMessage().'storage in'.ERROR_LOG_FILE."\n");
    }

    return $bdd;
}

/* TEST function
$bdd = connect_db('localhost', 'root', '0000', '3306', 'coding');

var_dump($bdd);

$requet = $bdd->query('SELECT * FROM movies');

var_dump($requet);

$donnée = $requet->fetch();

var_dump($donnée);*/

?>