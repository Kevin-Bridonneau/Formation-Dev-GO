<?php

define("ERROR_LOG_FILE","./errors.log");

function connect_db($argv)
{

    if (!isset($argv[1])||!isset($argv[2])||!isset($argv[3])||!isset($argv[4])||!isset($argv[5]))
    {   
        $erreurfile = ERROR_LOG_FILE;
        echo "Bad params! Usage: php connect_db.php host username password port db\n";
        error_log("Bad params! Usage: php connect_db.php host username password port db\n", 3, $erreurfile );
        return false;
    }
    try
    {
        $host = $argv[1];
        $username = $argv[2];
        $passwd = $argv[3];
        $port = $argv[4];
        $db = $argv[5];
        $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port.';charset=utf8', $username, $passwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $Exception)
    {   
        $erreurfile = ERROR_LOG_FILE;
        echo "Error connection to DB\n";
        error_log("Error connection to DB\n", 3, $erreurfile );
        error_log($Exception->getMessage()."\n", 3, $erreurfile );
        die('PDO ERROR: ' . $Exception->getMessage().'storage in'.ERROR_LOG_FILE."\n");
    }

    echo "Connection to DB successful\n";
    return $bdd;
}

connect_db($argv);

?>