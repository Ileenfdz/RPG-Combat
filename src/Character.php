<?php

namespace App;

class Character{
    
    public $health;
    public $alive;
    public $level;
    public $damage;
    public $heal;
    public $type;
    public $range;

    public $message;

    public function __construct(){
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->message = '';
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

    public function getDamage($damage){
        return $this->damage =  $damage;
    }

    public function getHeal($heal){
        return $this->heal = $heal;
    }

    public function getType($type){ 
        return $this->type = $type;
    }

    public function getRange($char){
        if($char->type == 'melee'){
            return $this->range = 2;
        }
        if($char->type == 'ranged'){
            return $this->range = 20;
        }
    }


    public function doDamage($char1, $char2){
        if($char1 === $char2){
            return;
        }

        if($char2->type == 'melee' && $char2->range > 2){
            return;
        }

        if($char2->type == 'ranged' && $char2->range > 20){
            return;
        }

        $char1Health = $char1->health;
        $char1Level = $char1->level;
        
        $char2Damage = $char2->damage;
        $char2Level = $char2->level;

        if(($char2Level - 5) >= $char1Level){
            $char1Health = $char1Health - ($char2Damage - $char2Damage / 2);
        }else if(($char2Level - 5) < $char1Level){ 
            $char1Health = $char1Health - ($char2Damage + $char2Damage / 2);
        }
        
        if($char1Health <= 0){
            $this->alive = false;
            return $this->health = 0;
        }else{
            return $this->health = $char1Health;
        }
    }

    public function doDamageWMessage($char1, $char2){
        
        if($char1 === $char2){
            return $this->message = 'Out of range';
        }

        if($char2->type == 'melee' && $char2->range > 2){
            return $this->message = 'Out of range';
        }

        if($char2->type == 'ranged' && $char2->range > 20){
            return $this->message = 'Out of range';
        }

        $char1Health = $char1->health;
        $char1Level = $char1->level;
        
        $char2Damage = $char2->damage;
        $char2Level = $char2->level;

        if(($char2Level - 5) >= $char1Level){
            $char1Health = $char1Health - ($char2Damage - $char2Damage / 2);
        }else if(($char2Level - 5) < $char1Level){ 
            $char1Health = $char1Health - ($char2Damage + $char2Damage / 2);
        }
        
        if($char1Health <= 0){
            $this->message = 'In range';
            $this->alive = false;
            return $this->health = 0;
        }else{
            $this->message = 'In range';
            return $this->health = $char1Health;
        }
    }

    public function healAlly($char1, $char2){
        if($char1 !== $char2){
            return;
        }

        $char1Health = $char1->health;
        $char2Heal = $char2->heal;

        if($char1Health <= 0){
            return $this->alive = false;
        }

        $char1Health = $char1Health + $char2Heal;

        if($char1Health > 1000){
            return $this->health = 1000;
        }

        return $this->health = $char1Health;
    }

    public function healSelf($char){
        $charHealth = $char->health;
        $charHeal = $char->heal;

        if($charHealth <= 0){
            return $this->alive = false;
        }

        $charHealth = $charHealth + $charHeal;

        if($charHealth > 1000){
            return $this->health = 1000;
        }

        return $this->health = $charHealth;
    }
}
