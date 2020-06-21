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

    public function correct($arcanist)
    {
        if(in_array("IPerso",class_implements($arcanist)))
        {
            echo "Test 0: Good!\n";
        }
        else
        {
            echo "Test 0: KO\n";    
        }

        if(is_subclass_of ($arcanist, "AUnit"))
        {
            $class = new ReflectionClass($arcanist);
            $parentclass = $class->getParentClass();
            if($parentclass->isAbstract())
            {
                echo "Test 1: Good!\n";
            }
            else echo "Test 1: KO\n";
  
        }
        else
        {
            echo "Test 1: KO\n";    
        }
    }
}

?>