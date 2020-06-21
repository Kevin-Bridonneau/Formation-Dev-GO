<?php

class Gecko
{
  private $name;
  private $age;
  
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
 
}

$dylan = new Gecko("Delan");
$dylan->hello("test");


?>