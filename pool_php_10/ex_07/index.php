<?php

    if(isset($_COOKIE['user_data'])) 
    {

        $user_data = unserialize($_COOKIE['user_data']);
        echo "Hello ".$user_data["name"];
    }
    else
    {
        session_start();
        if(isset($_SESSION["user_data"]))
        {
            $user_data = $_SESSION["user_data"];
            echo "Hello ".$user_data["name"];     
        }
        else
        {
            header("location:login.php");
        }
    }


?>
<style>
    div
    {
        display: inline;
        text-align: center;
        margin-top: 50vh; /* poussé de la moitié de hauteur de viewport */
  transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */

    }
    div .title 
    {
        color:blue;
    }
    div .author 
    {
        color:red;
    }
    div .content
    {
        background-color: lightblue;
    }
    div .news 
    {

    }
</style>
<br>
<a href="logout.php">Logout</a>
<br>
<a href="modify_account.php">Settings</a>
<?php

    if($user_data["is_admin"])
    {
?>
        <br>
        <a href="admin.php">Admin settings</a>
        <br>
        <a href="newsletter.php">Create newsletter</a>
<?php
    }
?>


<br><br>
<div class="news">
    <h4>Les NEWS</h4>
    <?php

    function connectToBdd()
    {
        try 
        {
            $bdd = new PDO("mysql:host=localhost;dbname=my_Bdd;port=3306;charset=utf8", "root", "0000");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } 
        catch (PDOException $pdoException) 
        {
            die($e->getMessage());
        }
        return $bdd;
    }

    $bdd = connectToBdd();

    //creation de la table si elle n'éxiste pas

    $request = "CREATE TABLE IF NOT EXISTS newsletter (
        `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(30) NOT NULL,
        `content` VARCHAR(25555) NOT NULL,
        `author_id` INT UNSIGNED NOT NULL,
        FOREIGN KEY (author_id) REFERENCES users(id))";
    
    $bdd->exec($request);

    $allNews = "SELECT newsletter.content,newsletter.title, users.name
                FROM newsletter, users
                WHERE newsletter.author_id = users.id
                ORDER BY newsletter.id DESC";
    $request = $bdd->query($allNews);
    $data = $request->fetchall();
    foreach($data as $row)
    {
    ?>
            <br>
            <div class="bloc">
                <p>
                <div class="title"><?php echo $row["title"];?><br></div> 
                <div class="content"><?php echo $row["content"].",created by ";?><div class="author"><?php echo $row["name"];?></div></div> 
                </p>              
            </div>
            <br>
    <?php
    }


    ?>
</div>