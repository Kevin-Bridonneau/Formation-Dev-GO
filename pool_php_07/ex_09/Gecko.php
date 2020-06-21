<?php

class Gecko
{
    public $friends = array();
    public $skills;

    public function __construct($friends, $skills)
    {
        if(is_array($friends) && gettype($skills) == "object" && get_class($skills) == "Skill")
        {
            $this->friends = $friends;
            $this->skills = $skills;
        }
    }
}

?>