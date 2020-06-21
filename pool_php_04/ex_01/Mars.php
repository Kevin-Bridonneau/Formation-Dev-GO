<?php



class Mars
{
    private $id;
    public static $count=0;

    public function __construct()
    {
    $this->id = Mars::$count;
    Mars::$count++;
    return true;
    }

    public function getId()
    {
        return $this->id;
    }


}







?>