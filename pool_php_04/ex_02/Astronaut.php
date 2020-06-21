<?php



class Astronaut
{
    private $name;
    private $snacks;
    private $destination;
    private $id;
    public static $count=0;

    public function __construct($Name)
    {
        $this->name = $Name ;
        $this->snacks = 0 ;
        $this->destination = NULL ;
        $this->id = Astronaut::$count ;
        Astronaut::$count++ ;
        echo $this->name." ready for launch !\n";
        return true ;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDestination()
    {
        return $this->destination;
    }

}








?>