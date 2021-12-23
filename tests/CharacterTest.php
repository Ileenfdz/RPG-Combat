<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;
use App\Faction;

class CharacterTest extends TestCase {

	public function function_base(){
		//Given
		//Then
		//When
	}

	public function test_basic_health(){
		//Given
		$character1=new Character;
		$resultExpected=1000;
		//Then
		$character1->getHealth();
		//When
		$this->assertEquals($resultExpected,$character1->health);
	}

	public function test_base_level(){
		//Given
		$character1=new Character();
		$resultExpected=1;
		//Then
		$character1->getLevel();
		//When
		$this->assertEquals($resultExpected,$character1->level);
	}

	public function test_base_alive(){
		//Given
		$character1=new Character();
		$resultExpected=true;
		//Then
		$character1->getLevel();
		//When
		$this->assertEquals($resultExpected,$character1->level);
	}
	
	public function base_damage(){
		//Given
		$character1=new Character();
		$character2=new Character();
		$resultExpected=200;
		//Then
		$character2->getDamage();
		$character1->doDamage($character1->health,$character2->damage);
		//When
		$this->assertEquals($resultExpected,$character1->health);
	}
}