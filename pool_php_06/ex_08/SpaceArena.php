<?php

class SpaceArena
{
    public $listmonsters= array() ;
    public $listmarines = array() ;

    public function enlistMonsters($monsters)
    {
        foreach($monsters as $monster)
        {
            if(gettype($monster)== "object" && get_parent_class($monster) == "AMonster" && !in_array($monster,$this->listmonsters))
            {
                array_push($this->listmonsters, $monster);
            }
            else
            {
                throw new Exception("Stop Trying to cheat!");
            }
            
        }
    }

    public function enlistSpaceMarines($marines)
    {
        foreach($marines as $marine)
        {
            if(gettype($marine)== "object" && get_parent_class($marine) == "ASpaceMarine" && !in_array($marine,$this->listmarines))
            {
                array_push($this->listmarines, $marine);
            }
            else
            {
                throw new Exception("Stop Trying to cheat!");
            }
        }
    }

    public function fight()
    {
        if(is_null($this->listmonsters[0]))
        {
            echo "No monster available to fight.\n";
            return false;
        }
        elseif(is_null($this->listmarines[0]))
        {
            echo "Those cowards ran away.\n";
            return false;
        }
        else
        {

        }
    }


}


?>