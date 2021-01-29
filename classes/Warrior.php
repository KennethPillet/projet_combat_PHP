<?php

class Warrior extends Character
{
    public $rage = false;

    public function action($target) {
        $rand = rand(1, 10);
        if ($rand <= 2 && !$this->rage) {
            $status = $this->rage();
        } else {
            $status = $this->sword($target);
        }
        return $status;
    }

    public function sword($target) {
        if ($this->rage) {
            $rand = rand(15, 30)/10;
            $rageDamage = $this->damage * $rand;
            $target->setHealthPoints($rageDamage);
            $this->rage = false;
        } else {
            $target->setHealthPoints($this->damage);
        }
        $status = "$this->name donne un coup d'épée à $target->name !<br>";
        return $status;
    }

    public function rage() {
        $this->rage = true;
        $status = "$this->name s'énerve ! <br>";
        return $status;
    }
}
