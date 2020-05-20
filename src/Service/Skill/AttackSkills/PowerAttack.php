<?php


namespace Hero\Service\Skill\AttackSkills;


use Hero\Entity\Interfaces\Character;
use Hero\Helper\Output;
use Hero\Service\Skill\AbstractSkill;
use Hero\Service\Skill\SkillInterface;

class PowerAttack extends AbstractSkill implements SkillInterface {

	//increase to activate it
	protected $chance = 0;

	public function handle( Character $attackingForce, Character $defendingForce, int &$damage ) {
		$originalDamage = $damage;

		$damage *= 2;

		Output::print($attackingForce.' activates his power attack and doubles the damage power from '.$originalDamage.' to '.$damage);
	}
}
