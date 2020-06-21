<?php

class Gecko
{
  private $name;
  private $age;
  private $energy=100;
  
  public function __construct(...$argv)
    {

      $numargs = func_num_args();
      if($numargs === 0)
      {
        echo "Hello !\n" ;
      }
      else if($numargs === 1)
      {
        $this->name = $argv[0];
        echo "Hello ".$argv[0]." !\n" ; 
      }
      else if($numargs === 2)
      {
        $this->name = $argv[0];
        $this->age = $argv[1];
        echo "Hello ".$argv[0]." !\n" ; 
      }
    }

  public  function __destruct()
    {
      
      if((gettype($this->name)) == "NULL")
      {
        echo "Bye !\n";
      }
      else
      {
        echo "Bye " . $this->name." !\n"; 
      }
    
    }
  
  public function getName()
    {
      return $this->name;
    }

  public function getAge()
    {
      return $this->age;
    }
  public function setAge($age)
    {
      return $this->age = $age;
    }

  public function status()
  {
    switch(true)
    {
      case ($this->age == 0):
        echo"Unborn Gecko\n";
        break;
      
      case (($this->age == 1)||($this->age == 2)):
        echo"Baby Gecko\n";
        break;

      case (($this->age >= 3)&&($this->age <= 10)):
        echo"Adult Gecko\n";
        break;

      case (($this->age >= 11)&&($this->age <= 13)):
        echo"Old Gecko\n";
        break;
      
      default:
        echo"Impossible Gecko\n";
      break;

      
    }
  }
  
  public function hello($arg)
  {
    if(is_int($arg))
    {
      for($i = 0; $i < $arg ; $i++ )
      {
        if(is_null($this->name))
        {
          echo "Hello !\n";
        }
        else
        {
          echo "Hello, I'm ".$this->name."!\n";
        }
      }
    }
    else if(is_string($arg))
    {
      if(is_null($this->name))
        {
          echo "Hello ".$arg."!\n";
        }
        else
        {
          echo "Hello ".$arg.", I'm ".$this->name."!\n";
        }
    }
  }
  
  public function eat($food)
  {
    if (strcasecmp($food, "Meat") == 0)
    {
      $food2 = "Meat";
    }
    else if (strcasecmp($food, "Vegetable") == 0)
    {
      $food2 = "Vegetable";
    }
    else 
    {
      $food2 = "nothing";
    }

    switch($food2)
    {
      case "Meat":
          echo "Yummy!\n";
          $this->majEnergy(10);
        break;

      case "Vegetable":
          echo "Erk!\n";
          $this->majEnergy(-10);
        break;

      default:
        echo "I can't eat this.\n";
        break;
    }
  }

  public function getEnergy()
  {
    return $this->energy;
  }

  public function majEnergy($value)
  {
    if((($this->energy) + $value < 100)&&(($this->energy) + $value > 0))
    {
      $this->energy += $value;
    }
    else if(($this->energy) + $value >= 100)
    {
      $this->energy = 100;
    }
    else if(($this->energy) + $value <= 0)
    {
      $this->energy = 0;
    }

  }
  public function setEnergy($value)
  {
    if($value > 100)
    {
      return $this->energy = 100;
    }
    else if($value < 0)
    {
      return $this->energy = 0;
    }
    else
    {
      return $this->energy = $value;
    }

  }

}




?>