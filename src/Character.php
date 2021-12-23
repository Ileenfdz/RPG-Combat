<?php

namespace App;


class Character{
    
    public $health;
    public $alive;
    public $level;
    public $damage;

    public function __construct(){
        $this->health=1000;
        $this->level=1;
        $this->alive=true;
        $this->damage=800;
    }

    public function getHealth(){
        return $this->health;
    }

    public function getLevel(){
        return $this->level;
    }

    public function getAlive(){
        return $this->alive;
    }

    public function getDamage(){
        return $this->damage;
    }

    public function doDamage($health, $damage){
        return $health = $health - $damage;
    }
}
