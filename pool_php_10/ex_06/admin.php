<?php

define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","0000");
define("DB_PORT","3306");
define("DB_NAME","my_Bdd");

//vérification si l'utilisateur est administrateur
    if(isset($_COOKIE['user_data'])) 
    {

        $user_data = unserialize($_COOKIE['user_data']);
        if($user_data["is_admin"])
        {

        }
        else
        {
            header("location:index.php");
        }
    }
    else
    {
        session_start();
        if(isset($_SESSION["user_data"]))
        {
            $user_data = $_SESSION["user_data"];
            if($user_data["is_admin"])
            {
    
            }
            else
            {
                header("location:index.php");
            }
   
        }
        else
        {
            header("location:index.php");
        }
    }


//function de connection à la bdd
function connect_db($host=NULL, $username=NULL, $passwd=NULL, $port=NULL, $db=NULL)
{

    if (!isset($host)||!isset($username)||!isset($passwd)||!isset($port)||!isset($db))
    {   
        $erreurfile = ERROR_LOG_FILE;
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
        error_log("Error connection to DB\n", 3, $erreurfile );
        error_log($Exception->getMessage()."\n", 3, $erreurfile );
        die('PDO ERROR: ' . $Exception->getMessage().'storage in'.ERROR_LOG_FILE."\n");
    }
    return $bdd;
}

//connection à la bdd
$bdd = connect_db(DB_HOST,DB_USERNAME, DB_PASSWORD , DB_PORT, DB_NAME);


if(isset($_GET["id"])&&isset($_GET["is_admin"]))
{
    if($_GET["is_admin"] == 1)
    {
        echo "You can't delete an administrator\n";
    }
    else
    {
        $id = $_GET["id"];
        $deleteUser = 'DELETE FROM users WHERE id = \' '.$id.' \'';
        $prep = $bdd->query($deleteUser);
        $prep->execute();
    }
}



$allEmailUsers = "SELECT id, email, is_admin FROM users ORDER BY email ASC";
$request = $bdd->query($allEmailUsers);
$data = $request->fetchall();
foreach($data as $row)
{
?>
        <br>
        <a href="admin.php<?php echo "?id=".$row["id"]."&is_admin=".$row["is_admin"]?>"><?php echo $row["email"]?></a>
<?php
}



?>