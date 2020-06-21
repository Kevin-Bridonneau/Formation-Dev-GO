<?php

namespace chocolate
{

    class Mars
    {
        public $id;
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
    function getNamespace()
    {
        echo __NAMESPACE__."\n";
    }

}

namespace planet
{
    class Mars
    {
        public $id;
        private $size;
        public static $count=0;

        public function __construct(...$arg)
        {
            if(empty($arg[0]))
            {
                $this->id = Mars::$count;
                Mars::$count++;
                return true;
            }
            else 
            {
                $this->size = $arg[0];
                $this->id = Mars::$count;
                Mars::$count++;
                return true;
            }   
            

        }

        public function getId()
        {
            return $this->id;
        }

        public function getSize()
        {
            return $this->size;
        }

        public function setSize($value)
        {

        $this->size = $value;
        }

    }
    
    function getNamespace()
    {
        echo __NAMESPACE__."\n";
    }

}











?>