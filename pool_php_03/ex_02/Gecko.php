<?php

class Gecko
{
  public $name;

    public function __construct(...$argv)
    {

      $numargs = func_num_args();
      if($numargs === 0)
      {
        echo "Hello !\n" ;
      }
      else 
      {
        $this->name = $argv[0];
        echo "Hello ".$argv[0]." !\n" ;
        
      }
      

    }



  
}

?>