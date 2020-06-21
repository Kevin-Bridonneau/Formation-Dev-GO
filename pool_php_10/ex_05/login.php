<?php

define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","0000");
define("DB_PORT","3306");
define("DB_NAME","my_Bdd");

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


//vérification existance de l'utilisateur + creation du cookies de connection
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bdd = connect_db(DB_HOST,DB_USERNAME, DB_PASSWORD , DB_PORT, DB_NAME);
    $userExist = "SELECT email FROM users WHERE email = '".$email."'";
    $request = $bdd->query($userExist);
    if($request->fetch())
    {
        $passwordCheck = "SELECT password FROM users WHERE email = '".$email."'";
        $request = $bdd->query($passwordCheck);
        $data = $request->fetch();
        if(password_verify($password,$data["password"]))
        {
            $takeUserData = "SELECT * FROM users WHERE email = '".$email."'";
            $request = $bdd->query($takeUserData);
            $data = $request->fetch();

            if(isset($_POST['name']) && ($_POST['name'] === 'remember_me'))
            {
                $user = serialize($data);
                
                setcookie('user_data' , $user, time()+3600);

                header("location:index.php");
                exit();
            }
            else
            {
                session_start();
                $_SESSION["user_data"]=$data;
                header("location:index.php");
                exit();
            }

        }
        else
        {
            echo "Incorrect email/password\n";
        }
    }
    else
    {
        echo "Incorrect email/password\n";
    }
}


?>


<form method="post">
    <input type="text" name="email" value="Email"><br>
    <input type="password" name="password" value="password"><br>
    <input type="checkbox" name="name" value="remember_me"><label for="name">Remember me</label><br>
    <input type="submit" value="Submit">
</form>