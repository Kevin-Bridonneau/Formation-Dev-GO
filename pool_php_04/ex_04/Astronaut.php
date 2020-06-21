<?php



class Astronaut
{
    private $name;
    private $snacks=0;
    private $destination;
    private $id;


    public static $count=0;

    public function __construct($Name)
    {
        $this->name = $Name ;
        $this->snacks = 0 ;
        $this->id = Astronaut::$count ;
        Astronaut::$count++ ;
        echo $this->name." ready for launch !\n";
        return true ;
    }
    public  function __destruct()
    {
      if(gettype($this->destination) !== "object")
      {
        echo $this->name.": I may have done nothing, but I have ".$this->snacks." Mars to eat at least !\n";
      }
      else
      {
        echo $this->name.": Mission aborted !\n"; 
      }
    
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDestination()
    {
        return $this->destination;
    }
    

    public function getSnacks()
    {
        return $this->snacks;
    }

    public function doActions(...$parameter)
    {
        
        if(empty($parameter[0]))
            {
                echo $this->name.": Nothing to do.\n";
            }
        else if(get_class($parameter[0])== "planet\Mars")
        {
            echo $this->name.": started a mission !\n";
            $this->destination = $parameter[0];
        } 
        else if(get_class($parameter[0])== "chocolate\Mars")
        {
            echo $this->name." is eating mars number ".$parameter[0]->id.".\n";
            $this->snacks++;
        } 
    }

    

}







?>