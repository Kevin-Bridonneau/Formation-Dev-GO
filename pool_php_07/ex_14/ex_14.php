<?php

for($i = 0 ; $i < 5 ; $i++)
{
    try
    {
        call_gecko();
    }
    catch (Exception $e)
    {
        echo $e->getMessage()."\n";
    }
}


?>