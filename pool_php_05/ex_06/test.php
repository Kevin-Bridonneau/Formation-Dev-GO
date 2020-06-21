<?php
include_once("Cat.php");
include_once("Shark.php");
include_once("Canary.php") ;
include_once("Animal.php");
include_once("BlueShark.php");
include_once("GreatWhite.php");
$is = new Animal("Is", 4, Animal::MAMMAL);
$coco = new Animal("Coco", 2, Animal::BIRD);
$nemo = new Animal("Nemo", 0, Animal::FISH);
$dory = new Animal("Dory", 0, Animal::FISH);
$titi = new Canary("Titi");
$willy = new Shark("Willy");
$blue = new BlueShark("Blue");
$white = new GreatWhite("White");
$chat= new Cat("Chat");
Animal::getNumberOfFishes();
Animal::getNumberOfBirds();
Animal::getNumberOfMammals();
Animal::getNumberOfAnimalsAlive();
$white->status();
$white->smellBlood(true);
$white->status();
$white->eat($is);
$white->eat($coco);
$white->eat($nemo);
$white->eat($titi);
$white->eat($chat);
$white->eat($white);
$white->eat($blue);
$white->eat($willy);

$white->status();


?>