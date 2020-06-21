<?php 
    //controle name
    if($_POST['name'] != NULL && (strlen($_POST['name']) <= 3 || strlen($_POST['name']) >= 10))
    {
        echo "Invalid name";
        echo '<br>'; 
    }
    if($_POST['name'] != NULL)
    {
        $name = $_POST['name'];
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

    if($_POST['email'] != NULL && !preg_match($regex, $_POST['email'])) 
    {
        echo "Invalid email";
        echo '<br>';
    }
    if($_POST['email'] != NULL)
    {
        $email = $_POST['email'];
    }
    else
    {
        $email = 'email';
    }

    //controle password
    if($_POST['password'] === NULL){}
    elseif($_POST['password'] != NULL && (strlen($_POST['password']) >= 3 && strlen($_POST['password']) <= 10))
    {
        if($_POST['password'] === $_POST['password_confirmation'])
        {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        else
        {
            echo "Invalid password or password confirmation";
            echo '<br>';
        }
    }
    else
    {
        echo "Invalid password or password confirmation";
        echo '<br>';
    }

    // creation fichier json
    if($name != NULL && $email != NULL && $password != NULL)
    {
        date_default_timezone_set('Europe/Paris');
        $now = date('l jS \of F Y h:i:s A');
        $data = array("name" => $name , "email" => $email , "password" => $password ,"created_at" => $now);
        $json = json_encode($data);
        file_put_contents ($name.".json",$json);
        //controle fichier json
        if(json_last_error_msg() === "No error" && file_get_contents ($name.".json")=== $json)
        {
            echo "User created";
            echo '<br>';
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