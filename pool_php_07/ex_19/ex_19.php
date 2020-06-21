<?php

class Gecko
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function correct($my_classes, $my_workspaces)
    {
        if(in_array("IPerso",class_implements($arcanist)))
        {
            echo "Test 0: Good!\n";
        }
        else
        {
            echo "Test 0: KO\n";    
        }

        if(get_parent_class($arcanist) == "AUnit")
        {
            $Class = new ReflectionClass($arcanist);
            if($class->isAbstract())
            {
                echo "Test 1: Good!\n";
            }
            echo "Test 1: KO\n";  
        }
        else
        {
            echo "Test 1: KO\n";    
        }
    }
}

?>