<?php
//creation random d'un salt md5
function createSalt()
{
    $text = uniqid(Rand(), TRUE);
    $salt = "$1$".substr($text, 0, 9);
    return $salt;

}
// hashage du password + renvoi du tableau avec pasword hash + salt
function my_password_hash($password)
{
    $salt = createSalt();
    $hash = crypt($password,$salt);
    return array("hash" => $hash, "salt" => $salt);
}
// vérification du mdp
function my_password_verify($password,$salt,$hash)
{
    if (strcmp((crypt($password,$salt)),$hash) == 0)
    {
        return true;
    }
    else return false;
}
?>