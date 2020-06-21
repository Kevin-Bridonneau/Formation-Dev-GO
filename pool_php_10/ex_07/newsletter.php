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

$title= "title";
$content= "content";

if(isset($_POST["title"])&&isset($_POST["content"]))
{
    $title = $_POST["title"];
    $content = $_POST["content"];

    //creation de la table si elle n'éxiste pas

    $request = "CREATE TABLE IF NOT EXISTS newsletter (
        `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(30) NOT NULL,
        `content` VARCHAR(25555) NOT NULL,
        `author_id` INT UNSIGNED NOT NULL,
        FOREIGN KEY (author_id) REFERENCES users(id))";
    
    $bdd->exec($request);

    if(strlen($title) < 2 || strlen($title) > 50)
    {
        echo "Invalid title<br>";

    }
    if(strlen($content) == 0)
    {
        echo "Invalid content<br>";
    }

    if((strlen($title) >= 2 && strlen($title) <= 50)&&(strlen($content) > 0))
    {
        $updateSql='INSERT INTO newsletter (title, content, author_id) VALUES (?,?,?)';
            $request = $bdd->prepare($updateSql);
            $request->bindParam(1, $title);
            $request->bindParam(2, $content);
            $request->bindParam(3, $user_data["id"]);
            $check = $request->execute();
            if($check)
            {
                header("location:index.php");
            }
    }


    
}

?>

<form method="post">
    <input type="text" name="title" value="<?php echo $title ?>"><br>
    <textarea rows="10" cols="50" name="content"><?php echo $content ?></textarea><br>
    <input type="submit" value="Submit"><br>
</form>


