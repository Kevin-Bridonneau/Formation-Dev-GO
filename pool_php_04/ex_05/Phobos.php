<?php

namespace planet\moon;
include_once("Mars.php");

    
    class Phobos
    {
        private $mars;

        public function __construct(...$object)
        {
            if((empty($object[0]))||(gettype($object[0])!= "object")||(get_class($object[0])!= "planet\Mars"))
            {
                echo "No planet given.\n";
            }
            else
            {
                echo "Phobos placed in orbit.\n";
                $this->mars = $object[0];
            }
        }


        public function getMars()
        {

            return $this->mars;
        }
    }
    





?>