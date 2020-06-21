<?php

function my_change_user ($bdd ,...$names)
{
    $selectSql='SELECT name FROM users WHERE name = ?';
    $updateSql='UPDATE users SET name = ? WHERE name = ?';
    $result=array();
    try
    {
        foreach($names as $name)
        {
            $prep = $bdd->prepare($selectSql);
            $prep->bindParam(1, $name);
            $prep->execute();
            $data= $prep->fetch();
    
                if($data["name"] != NULL && $data["name"] === $name)
                {
                    $newName = ucfirst($data["name"]."42");
                    $result[]= $newName;
                    $prep = $bdd->prepare($updateSql);
                    $prep->bindParam(1, $newName);
                    $prep->bindParam(2, $name);
                    $prep->execute();

                }
                else
                {
                    throw new PDOException('User not found');
                }
        }
    }
    catch (PDOException $Exception)
    {
        echo $Exception->getMessage();
    }
    finally 
    {
        echo "Good luck with the user DB!\n";
        if($result != NULL)
        {
            sort($result);
            array_multisort(array_map('strlen', $result), $result);
            return $result;
        }
    }

}
    

   

/*

// TEST function

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

var_dump(my_change_user ($bdd ,'Hugo4242424242424242','Martin424242424242','Loic4242424242','Thibault4242424242','Michel4242424242424242'));*/
?>