<?php

function my_print_users ($bdd,...$int)
{
    $sucess = FALSE;
    foreach($int as $id)
    {
        $request = $bdd->query('SELECT name FROM users WHERE id = '.$id.'');
        $data = $request->fetch();
        if($data != NULL)
        {
            echo $data["name"]."\n";
            $sucess = TRUE;
        }
        else
        {
            echo "Invalid id given\n";
        }
    }
    return $sucess;
}

// TEST function
/*
define("ERROR_LOG_FILE","./errors.log");

function connect_db($host=NULL, $username=NULL, $passwd=NULL, $port=NULL, $db=NULL)
{

    if (!isset($host)||!isset($username)||!isset($passwd)||!isset($port)||!isset($db))
    {
        echo "Bad params! Usage: php connect_db.php host username password port db\n";
        return false;
    }
    try
    {
        $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port.';charset=utf8', $username, $passwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $Exception)
    {   
        $erreurfile = ERROR_LOG_FILE;
        echo "Error connection to DB\n";
        error_log($Exception->getMessage()."\n", 3, $erreurfile );
        die('PDO ERROR: ' . $Exception->getMessage().'storage in'.ERROR_LOG_FILE."\n");
    }

    echo "Connection to DB successful\n";
    return $bdd;
}
*/

//$bdd = connect_db('localhost', 'root', '0000', '3306','gecko');

//my_print_users ($bdd,10,20);



?>