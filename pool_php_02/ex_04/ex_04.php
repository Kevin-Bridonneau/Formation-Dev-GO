<?php

//creation random d'un salt
function createSalt()
{
    $text = uniqid(Rand(), TRUE);
    return substr($text, 0, 5);

}



// hashage du password + renvoi du tableau avec pasword hash + salt
function my_password_hash($password)
{
    $salt = createSalt();
    $hash = md5($salt.$password);
    return array("hash" => $hash, "salt" => $salt);
}

// vérification du mdp
function my_password_verify($password,$salt,$hash)
{
    if (strcmp(md5($salt.$password),$hash) == 0)
    {
        return true;
    }
    else return false;
}


?>