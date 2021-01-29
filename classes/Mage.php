<?php 

class Mage extends Character
{
    private $shield = false ;

    public function __construct($healthPoints, $name) {
        parent::__construct($healthPoints, $name);
        $this->magicPoints *= 3;
        $this->damage = 5;
    }

    public function action($target){
        $rand = random_int(1, 10);

        if ($this->magicPoints == 0){
            $status = $this->staff($target);
            
        } else if ($rand > 3 || $this->shield){
            $status = $this->fireball($target);

        } else if ($rand <= 3) {
            $status = $this->magicShield();

        }
        return $status;
    }


    public function fireball($target){
        $magicCost = random_int(1, 20);

        if ($magicCost > $this->magicPoints){
            $fireballDamage = $this->magicPoints * random_int(1, 3);
            $this->magicPoints = 0;
    
        } else {
            $fireballDamage = $magicCost * random_int(1, 3);
            $this->magicPoints -= $magicCost;
           
        }
        $target->setHealthPoints($fireballDamage);
        $status = "$this->name lance une Boule de Feu: $fireballDamage Dégats + $magicCost MP | MP restant: $this->magicPoints ! <br>";
        return $status;
    }
    public function magicShield(){
        $this->shield = true;
        $status = "$this->name lance un bouclier magique | MP restant: $this->magicPoints !<br>";
        return $status;
    }
    public function staff($target) {
        $target->setHealthPoints($this->damage) ;
        $status = "$this->name donne un coup de baton: $this->damage Dégats à $target->name ! <br>";
        return $status;
    }

    public function setHealthPoints($damage){
        if(!$this->shield){
            $this->healthPoints -= $damage;
        } 
        $this->shield = false;
        $this->isAlive();
        return;
    }

    

}