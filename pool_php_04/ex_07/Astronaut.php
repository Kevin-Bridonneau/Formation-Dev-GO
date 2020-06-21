<?php



class Astronaut
{
    public $name;
    public $snacks=0;
    public $destination;
    public $id;


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

    public function doActions($param = NULL)
    {                                         
        if ($param == NULL)
        {                                                            
          echo $this->name.": Nothing to do.\n";                                        
        }                                                                               
        else 
        {                                                                          
          if (gettype($param) == 'object')
          {                                             
            if (get_class($param) == 'planet\Mars' || get_class($param) == 'planet\moon\Phobos' )
            {    
              echo $this->name.": started a mission !\n";                               
              $this->destination = $param;                                              
            }                                                                           
            elseif (get_class($param) == 'chocolate\Mars')
            {                             
              echo $this->name." is eating mars number ".$param->id.".\n";              
              $this->snacks += 1;                                                       
            };                                                                          
          };                                                                                                            
        };                                                                              
      }

    

}







?>