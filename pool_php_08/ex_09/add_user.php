<?php
define("ERROR_LOG_FILE","./errors.log");

//define test
/*
define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","0000");
define("DB_PORT","3306");
define("DB_NAME","gecko");
*/





function connect_db($host=NULL, $username=NULL, $passwd=NULL, $port=NULL, $db=NULL)
{

    if (!isset($host)||!isset($username)||!isset($passwd)||!isset($port)||!isset($db))
    {   
        $erreurfile = ERROR_LOG_FILE;
        echo "Bad params! Usage: php connect_db.php host username password port db\n";
        error_log("Bad params! Usage: php connect_db.php host username password port db\n", 3, $erreurfile );
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
        error_log("Error connection to DB\n", 3, $erreurfile );
        error_log($Exception->getMessage()."\n", 3, $erreurfile );
        die('PDO ERROR: ' . $Exception->getMessage().'storage in'.ERROR_LOG_FILE."\n");
    }

    echo "Connection to DB successful\n";
    return $bdd;
}

function script($argv)
{
    $login = $argv[1];
    $password = $argv[2];
    $password_conf = $argv[3];
    $role = $argv[4];
    $bdd = connect_db(DB_HOST,DB_USERNAME, DB_PASSWORD , DB_PORT, DB_NAME);
    if($password !== $password_conf)
    {
        echo "Passwords don’t match\n";
    }
    else if((strcasecmp($role,"ADM") !== 0) && (strcasecmp($role,"GLOBAL") !== 0) && (strcasecmp($role,"INVITE") !== 0))
    {
        echo "Bad role: ADM|GLOBAL|INVITE\n";
    }
    else
    {       
        $newrole = strtoupper($role);
        $passwordHash = hash( 'sha256', $password );
        $updateSql='INSERT INTO users (login, password, created_at, is_admin) VALUES (?,?,NOW(),? )';
        $request = $bdd->prepare($updateSql);
        $request->bindParam(1, $login);
        $request->bindParam(2, $passwordHash);
        $request->bindParam(3, $newrole);
        $check = $request->execute();
        if($check)
        {
            echo "User added to DB\n";
        }
        else
        {
            $erreurfile = ERROR_LOG_FILE;
            error_log($Exception->getMessage()."\n", 3, $erreurfile );
            die('Error MySQL, user not added, more infos in '.ERROR_LOG_FILE."\n");
        }


    }
}

script($argv);

?>