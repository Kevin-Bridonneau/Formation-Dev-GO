<?php

include_once("Team.php");
include_once("Mars.php");
include_once("Phobos.php");
include_once("Astronaut.php");

$snickers=new chocolate\Mars();
$titi = new planet\Mars();

$mutta = new Astronaut("Mutta");
$hibito = new Astronaut("Hibito");
$serika = new Astronaut("Serika");

$spaceBro = new Team("SpaceBrothers");

$spaceBro->add($mutta);
$spaceBro->showMembers();
$spaceBro->add($serika);
$spaceBro->showMembers();
$spaceBro->remove($hibito);
$spaceBro->showMembers();

$spaceBro->add($snickers);
$spaceBro->showMembers();
$tata = new planet\moon\Phobos($titi);
$serika->doActions($titi);
$spaceBro->showMembers();
$spaceBro->doActions();
$spaceBro->doActions($snickers);
$spaceBro->doActions($snickers);
$spaceBro->doActions($snickers);
$spaceBro->doActions($snickers);
$spaceBro->showMembers();
$spaceBro->remove($mutta);
$spaceBro->add($serika);
$spaceBro->showMembers();
$spaceBro->doActions($titi);






$spaceBro->doActions($snickers);
$spaceBro->doActions($snickers);
$spaceBro->doActions($snickers);
$spaceBro->doActions($snickers);
$spaceBro->doActions($snickers);
echo "--> \n";
$testNULL=NULL;
$spaceBro->doActions($testNULL);
echo "--< \n";

?>
