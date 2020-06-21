<?php

interface IUnit
{
    public function equip($parameter);
    public function attack($parameter);
    public function receiveDamage($parameter);
    public function moveCloseTo($parameter);
    public function recoverAP();

}


?>