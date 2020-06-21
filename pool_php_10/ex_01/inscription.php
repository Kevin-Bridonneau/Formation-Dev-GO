<?php 


    //controle name
    if(isset($_POST['name']) && (strlen($_POST['name']) >= 3 && strlen($_POST['name']) <= 10))
    {
        $name = $_POST['name'];   
    }
    elseif(isset($_POST['name']))
    {
        echo "Invalid name";
        echo '<br>'; 
        $name = 'name';
    }
    else
    {
        $name = 'name';
    }

    //controle email
    $atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
    $domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)                          
    $regex = '/^' . $atom . '+' .                 // Une ou plusieurs fois les caractères autorisés avant l'arobase
    '(\.' . $atom . '+)*' .                       // Suivis par zéro point ou plus
                                    // séparés par des caractères autorisés avant l'arobase
    '@' .                           // Suivis d'une arobase
    '(' . $domain . '{1,63}\.)+' .  // Suivi par 1 &#224; 63 caractères autorisés pour le nom de domaine
                                    // séparés par des points
    $domain . '{2,63}$/i';          // Suivi de 2 &#224; 63 caractères autorisés pour le nom de domaine

    if(isset($_POST['email']) && preg_match($regex, $_POST['email'])) 
    {
        $email = $_POST['email'];
    }
    elseif(isset($_POST['email']))
    {
        echo "Invalid email";
        echo '<br>';
        $email = 'email';
    }
    else
    {
        $email = 'email';
    }

    //controle password
    if( isset($_POST['password']) && (strlen($_POST['password']) >= 3 && strlen($_POST['password']) <= 10))
    {
        if($_POST['password'] === $_POST['password_confirmation'])
        {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        else
        {
            echo "Invalid password or password confirmation";
            echo '<br>';
            $password = NULL;
        }
    }
    else
    {
        $password = NULL;
    }

    // function connect to bdd and create BDD and table if not exists
    function connectToBdd()
    {
        try 
        {
            $pdo = new PDO('mysql:host=localhost', 'root', '0000');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } 
        catch (PDOException $pdoException) 
        {
            die($e->getMessage());
        }
         
        $req = $pdo->query('CREATE DATABASE IF NOT EXISTS my_Bdd');

        try 
        {
            $bdd = new PDO("mysql:host=localhost;dbname=my_Bdd;port=3306;charset=utf8", "root", "0000");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } 
        catch (PDOException $pdoException) 
        {
            die($e->getMessage());
        }
        
        $request = "CREATE TABLE IF NOT EXISTS users (
            `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(30) NOT NULL,
            `email` VARCHAR(50) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `is_admin` BOOLEAN )";
        
        $bdd->exec($request);

        return $bdd;

     
    }


    // CREATE NEW USER ON BDD 
    if($name != NULL && $email != NULL && $password != NULL)
    {
        $bdd = connectToBdd();

        $userExist = "SELECT email FROM users WHERE email = '".$email."'";
        $request = $bdd->query($userExist);
        if($request->fetch())
        {
            echo "User already exist\n";
        }
        else
        {
            $updateSql='INSERT INTO users (name,email, password, created_at, is_admin) VALUES (?,?,?,NOW(),?)';
            $request = $bdd->prepare($updateSql);
            $request->bindParam(1, $name);
            $request->bindParam(2, $email);
            $request->bindParam(3, $password);
            $is_admin = 0;
            $request->bindParam(4, $is_admin);
            $check = $request->execute();
            if($check)
            {
                echo "User created\n";
            }
            else
            {
                $erreurfile = ERROR_LOG_FILE;
                error_log($Exception->getMessage()."\n", 3, $erreurfile );
                die('Error MySQL, user not added, more infos in '.ERROR_LOG_FILE."\n");
            }
        }    
    }

?>

<form method="post">
    <input type="text" name="name" value=<?php echo $name ?>><br>
    <input type="text" name="email" value=<?php echo $email ?>><br>
    <input type="password" name="password" value="password"><br>
    <input type="password" name="password_confirmation" value="password_confirmation"><br>
    <input type="submit" value="Submit">
</form>