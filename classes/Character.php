<?php

abstract class Character
{
   
    public $name;
    public $healthPoints;
    protected $magicPoints = 15;
    public $damage = 10;


    public function __construct($healthPoints, $name) {
        $this->healthPoints = $healthPoints;
        $this->name = $name;

    }
    
    /* public function attack($target) {
            $target->setHealthPoints($this->damage) ;
            $status = "$this->name donne un coup d'épée: $this->damage Dégats à $target->name ! $target->name, HP: $target->healthPoints ! <br>";
            return $status;

    } */

    public function isAlive(){
        if ($this->healthPoints <= 0){
            $this->healthPoints = 0;
            return false ;

        } else {
            return true;

        }
    }

    public function setHealthPoints($damage){
        $this->healthPoints -= round($damage);
        $this->isAlive();
        return;
    }
}