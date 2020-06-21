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
    $bdd = connect_db(DB_HOST,DB_USERNAME, DB_PASSWORD , DB_PORT, DB_NAME);
    if(isset($argv[1])&&!isset($argv[2]))
    {
        die ("Bad params!Usage: php dump_users.php ".$argv[1]."\n");
    }
    elseif(isset($argv[1])&&isset($argv[2])&&isset($argv[3]))
    {
        $filter = $argv[1];
        $value = $argv[2];
        $exact = $argv[3];
        if(strcasecmp($filter,"password") == 0)
        {
            die ("Don’t try to filter the password, it’s not possible\n");
        }
        else
        {
            if(strcasecmp($exact,"true") == 0)
            {
                $par2 = $filter." = BINARY'".$value."'"; 
            }
            else
            {
                $par2 = $filter." LIKE '%".$value."'";
            }
            $request= $bdd->query("SELECT * FROM users WHERE $par2");
            if($request)
            {   
                $request= $bdd->query("SELECT * FROM users WHERE $par2");
                if($request->fetch())
                {   
                    $request= $bdd->query("SELECT * FROM users WHERE $par2");
                    while ($row = $request->fetch()) 
                    {
                        $id = $row["id"];
                        $login = $row["login"];
                        $role = $row["is_admin"];
                        $active = $row["is_active"];
                        if($active == "1") $act = "active";
                        else $act = "inactive";
                        $result = "[".$id."] ".$login." ".$role." (".$act.")\n";
                        echo $result;
                    }
                }
                else
                {
                    echo "No results matching your search\n";
                }
            }
            else
            {
                $erreurfile = ERROR_LOG_FILE;
                error_log($Exception->getMessage()."\n", 3, $erreurfile );
                die('Error MySQL, more infos in '.ERROR_LOG_FILE."\n");
            }                  
        }
    }
    else
    {
        $sqlAll = 'SELECT * FROM users';
        $request = $bdd->query($sqlAll);
        if($request)
        {
            $request = $bdd->query($sqlAll);
            $data = $request->fetchall();
            foreach($data as $row)
            {
                $id = $row["id"];
                $login = $row["login"];
                $role = $row["is_admin"];
                $active = $row["is_active"];
                if($active == "1") $act = "active";
                else $act = "inactive";
                $result = "[".$id."] ".$login." ".$role." (".$act.")\n";
                echo $result;
            }
        }
        else
        {
            $erreurfile = ERROR_LOG_FILE;
            error_log($Exception->getMessage()."\n", 3, $erreurfile );
            die('Error MySQL, more infos in '.ERROR_LOG_FILE."\n");
        }

    }

    
    
}

script($argv);



?>