<?php
include_once("Character.php");
class Mage extends Character
{

    public const CLASSE = "Mage";


    public function __construct($name)
    {
        $this->name = $name;
        $this->life = 70;
        $this->agility = 10;
        $this->strength = 3;
        $this->wit = 10;
        echo $this->name.": May the gods be with me.\n";

    }

    public function __destruct()
    {

        echo $this->name.": By the four gods, I passed away...\n";

    }

    public function getCLasse()
    {
        return Mage::CLASS;
    }

    public function attack()
    {
        echo $this->name.": Feel the power of my magic!\n";
    }

    public function moveRight()
    {
        echo $this->name.": moves right furtively.\n";
    }
    public function moveLeft()
    {
        echo $this->name.": moves left furtively.\n";
    }
    public function moveUp()
    {
        echo $this->name.": moves up furtively.\n";
    }
    public function moveDown()
    {
        echo $this->name.": moves down furtively.\n";
    }
}


?>