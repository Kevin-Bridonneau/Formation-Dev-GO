<?php

function my_show_db ($bdd , $table)
{
    $result = array();

    if(tableExists($bdd, $table))
    {
        foreach (generator($bdd , $table) as $value) 
        {
            $result[]=$value;
        }
        if($result != NULL)
        {
            return $result;
        }
    }
    else
    {
        return NULL;
    }
}

function tableExists($dbh, $id)
{
    $results = $dbh->query("SHOW TABLES LIKE '$id'");
    if(!$results) 
    {
        die( FALSE);
    }
    if($results->rowCount()>0)
    {
        return TRUE;
    }
}

function generator($bdd , $table)
{
    $SQL = "SELECT * FROM ".$table;
    foreach  ($bdd->query($SQL) as $row) 
    {
        $id = $row["id"];
        $name = $row["name"];
        $pass = $row["password"];
        $email = $row["email"];
        $created =$row["created_at"];
        $admin = $row["is_admin"];
        $result = "[id]=>[".$id."], [name]=>[".$name."], [password]=>[".$pass."], [email]=>[".$email."], [created_at]=>[".$created."], [is_admin]=>[".$admin."]";
        yield $result;
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

var_dump(my_show_db($bdd,'users'));*/


?>