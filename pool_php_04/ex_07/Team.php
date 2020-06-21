<?php

include_once("Astronaut.php");

    
    class Team
    {
        public $name;
        public $Astronauts =array();

        public function __construct($name)
        {
            $this->name = $name;
        }


        public function getAstronauts()
        {
            return $this->Astronauts;
        }


        public function add($astronaut)
        {
 
            if ((gettype($astronaut) == "object" )&&(get_class($astronaut)== "Astronaut"))
            {
                if(!in_array($astronaut, $this->Astronauts))
                {
                    array_push($this->Astronauts,$astronaut);
                }
                

            }
            else
            {
                echo $this->name.": Sorry, you are not part of the team.\n";
            }

        }

        public function remove($astronaut)
        {
            if ((gettype($astronaut) == "object" )&&(get_class($astronaut)== "Astronaut")&&(in_array($astronaut, $this->Astronauts)))
            {
                unset($this->Astronauts[array_search($astronaut, $this->Astronauts)]);
            }

        }
        public function countMembers()
        {
            return count($this->Astronauts);
        }

        public function showMembers()
        {
            $whidth = count($this->Astronauts);
            if($whidth == 0)
            {

            }
            else
            {
                $i = 0;
            echo $this->name.":";
            foreach($this->Astronauts as $astronaut)
            {
                if($astronaut->getDestination() != NULL)
                {
                    if($i != $whidth - 1)
                    {
                        echo " ".$astronaut->name." on mission,";
                        $i++;
                    }
                    else
                    {
                        
                        echo " ".$astronaut->name." on mission";
                        $i++;
                    }
                }
                else
                {
                    if($i != $whidth - 1)
                    {
                        echo " ".$astronaut->name." on standby,";
                        $i++;
                    }
                    else
                    {
                        echo " ".$astronaut->name." on standby";
                        $i++;
                    }
                }
                
            }
            echo ".\n";
            }
            
        }


        public function doActions($parameter = NULL)
        {                                         
            if ($parameter == NULL)
            {                                                            
              echo $this->name.": Nothing to do.\n";                                        
            }                                                                               
            else 
            {                                                                          
              if (gettype($parameter) == 'object')
              {                                             
                if (get_class($parameter) == 'planet\Mars' || get_class($parameter) == 'planet\moon\Phobos' )
                {    
                    foreach($this->Astronauts as $astronaut)
                    {
                    $astronaut->destination = $parameter;
                    }                                              
                }                                                                           
                elseif (get_class($parameter) == 'chocolate\Mars')
                {                             
                    foreach($this->Astronauts as $astronaut)
                    {
                        $astronaut->snacks++;
                    }                                                      
                };                                                                          
              };                                                                                                            
            };                                                                              
        }


    }
    





?>