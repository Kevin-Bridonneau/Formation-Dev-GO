<?php
function my_very_secure_hash($password)
{
    return crypt($password,'$1$somethin$');
}
?>