<?php

function my_password_change($bdd, $login, $new_password=NULL)
{
    if(!isset($new_password))
    {
        throw new Exception();
    }

    $prep = $bdd->prepare("SELECT password FROM users WHERE email = ? ");
    $prep->bindParam(1, $login);
    $prep->execute();
    $data= $prep->fetch();
    if($data["password"] != NULL)
    {
        $prepupdate = $bdd->prepare("UPDATE users SET password = ? WHERE email = ?");
        $passhash = password_hash($new_password, PASSWORD_DEFAULT);
        $prepupdate->bindParam(1, $passhash) ;
        $prepupdate->bindParam(2, $login);
        $prepupdate->execute();
        $prep = $bdd->prepare("SELECT password FROM users WHERE email = ? ");
        $prep->bindParam(1, $login);
        $prep->execute();
        $npassword= $prep->fetch();
        password_verify($new_password, $npassword["password"]);
    }
    else
    {
        throw new Exception();
    }
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


$bdd = connect_db('localhost', 'root', '0000', '3306','gecko');

my_password_change($bdd, "hugo@hugo.co","yolo");*/




?>