<?php

namespace Imperium
{
    class Soldier
    {
        private $hp;
        private $attack;
        private $name;

        public function __construct($name,$hp=50,$attack=12)
        {
            $this->name = $name;
            $this->attack = $attack;
            $this->hp = $hp;
        }

        public function __toString()
        {
            return $this->name." the ".$this->getNamespace()." Space Marine : ".$this->hp." HP.";
        }

        public function getHp()
        {
            return $this->hp;
        }

        public function setHp($hp)
        {
            $this->hp = $hp;
        }

        public function getAttack()
        {
            return $this->attack;
        }

        public function setAttack($atack)
        {
            $this->attack = $attack;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        function getNamespace()
        {
            return __NAMESPACE__;
        }

        public function __set($var, $value)
        {   
            if($var == "hp")
            {
                $this->hp = $value;
            }
        }
    
        public function __get($var)
        {
            if($var == "hp")
            {
                return $this->hp;
            }
        }

        public function doDamage($soldier)
        {
            $soldier->hp -= $this->attack; 
        }


    }
}

namespace Chaos
{
    class Soldier
    {
        private $hp;
        private $attack;
        private $name;

        public function __construct($name,$hp=70,$attack=12)
        {
            $this->name = $name;
            $this->attack = $attack;
            $this->hp = $hp;
        }

        public function __toString()
        {
            return $this->name." the ".$this->getNamespace()." Space Marine : ".$this->hp." HP.";
        }

        public function getHp()
        {
            return $this->hp;
        }

        public function setHp($hp)
        {
            $this->hp = $hp;
        }

        public function getAttack()
        {
            return $this->attack;
        }

        public function setAttack($atack)
        {
            $this->attack = $attack;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        function getNamespace()
        {
            return __NAMESPACE__;
        }

        public function __set($var, $value)
        {   
            if($var == "hp")
            {
                $this->hp = $value;
            }
        }
    
        public function __get($var)
        {
            if($var == "hp")
            {
                return $this->hp;
            }
        }

        public function doDamage($soldier)
        {
            $soldier->hp -= $this->attack; 
        }
    }
}
?>