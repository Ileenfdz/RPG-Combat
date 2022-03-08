<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;

class CharacterTest extends TestCase
{
    public function function_base()
    {
        //Given
        //When
        //Then
    }

    public function test_basic_health()
    {
        //Given
        $character1 = new Character;
        $healthExpected = 1000;
        //When
        $character1->getHealth();
        //Then
        $this->assertEquals($healthExpected, $character1->health);
    }

    public function test_base_level()
    {
        //Given
        $character1 = new Character();
        $levelExpected = 1;
        //When
        $character1->getLevel();
        //Then
        $this->assertEquals($levelExpected, $character1->level);
    }

    public function test_base_alive_true()
    {
        //Given
        $character1 = new Character();
        $aliveExpected = true;
        //When
        $character1->getLevel();
        //Then
        $this->assertEquals($aliveExpected, $character1->alive);
    }

    public function test_base_alive_false()
    {
        //Given
        $character1 = new Character();
        $character1->alive = false;
        $aliveExpected = false;
        //When
        $character1->getLevel();
        //Then
        $this->assertEquals($aliveExpected, $character1->alive);
    }
    
    public function test_base_damage_to_first_character()
    {
        //Given
        $character1 = new Character();
        $character2 = new Character();
        $healthExpected = 0;
        //When
        $character2->getDamage(1200);
        $character1->doDamage($character1, $character2);
        //Then
        $this->assertEquals($healthExpected, $character1->health);
    }

	public function test_if_the_health_is_less_than_0_after_damage_is_dead()
	{
		//Given
		$character1 = new Character();
        $character2 = new Character();
		$aliveExpected = false;
		//When
		$character2->getDamage(1200);
        $character1->doDamage($character1, $character2);
		//Then
		$this->assertEquals($aliveExpected, $character1->alive);
	}

	public function test_cannot_heal_another_character()
	{
		//Given
		$character1 = new Character();
		$character1->health = 200;
		$character2 = new Character();
		$healthExpected = 200;
		//When
		$character2->getHeal(200);
		$character1->healAlly($character1, $character2);
		//Then
		$this->assertEquals($healthExpected, $character1->health);
	}

	public function test_cannot_heal_another_character_when_dead()
	{
		//Given
		$character1 = new Character();
		$character1->health = 0;
		$character1->alive = false;
		$character2 = new Character();
		$healthExpected = 0;
		$aliveExpected = false;
        //When
		$character2->getHeal(200);
		$character1->healAlly($character1, $character2);
        //Then
		$this->AssertEquals($healthExpected, $character1->health);
		$this->AssertEquals($aliveExpected, $character1->alive);
	}

	public function test_cannot_over_heal_another_character()
	{
		//Given
		$character1 = new Character();
		$character2 = new Character();
		$healthExpected = 1000;
        //When
		$character2->getHeal(200);
		$character1->healAlly($character1, $character2);
        //Then
		$this->assertEquals($healthExpected, $character1->health);
	}

	public function test_can_heal_itself()
	{
		//Given
		$character1 = new Character();
		$character1->health = 200;
		$healthExpected = 400;
		//When
		$character1->getHeal(200);
		$character1->healSelf($character1);
		//Then
		$this->assertEquals($healthExpected, $character1->health);
	}

	public function test_cannot_heal_itself_when_dead()
	{
		//Given
		$character1 = new Character();
		$character1->health = 0;
		$character1->alive = false;
		$healthExpected = 0;
		$aliveExpected = false;
        //When
		$character1->getHeal(200);
		$character1->healSelf($character1);
        //Then
		$this->AssertEquals($healthExpected, $character1->health);
		$this->AssertEquals($aliveExpected, $character1->alive);
	}

	public function test_cannot_over_heal_itself()
	{
		//Given
		$character1 = new Character();
		$healthExpected = 1000;
        //When
		$character1->getHeal(200);
		$character1->healSelf($character1);
        //Then
		$this->assertEquals($healthExpected, $character1->health);
	}

	public function test_target_is_5_levels_above_doing_less_damage()
	{
		//Given
		$character1 = new Character();
		$character2 = new Character();
		$character2->level = 7;
		$healthExpected = 900;
        //When
		$character2->getDamage(200);
		$character1->doDamage($character1, $character2);
        //Then
		$this->assertEquals($healthExpected, $character1->health);
	}

	public function test_target_is_not_5_levels_above_doing_more_damage()
	{
		//Given
		$character1 = new Character();
		$character2 = new Character();
		$character2->level = 4;
		$healthExpected = 700;
        //When
		$character2->getDamage(200);
		$character1->doDamage($character1, $character2);
        //Then
		$this->assertEquals($healthExpected, $character1->health);
	}
}
