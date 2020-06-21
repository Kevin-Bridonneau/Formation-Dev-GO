<?php
    function modify_cookie($cookie, $value)
    {
        setcookie($cookie, $value, time()+3600);
    }
?>