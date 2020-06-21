<?php
    function remove_cookie($cookie)
    {
        if(isset($_COOKIE[$cookie]))
        {
            setcookie($cookie, time() -3600);
        }
    }
?>