<?php
namespace Hero\Service\Skill\DefenceSkills;

use Hero\Service\Skill\AbstractSkill;
use Hero\Service\Skill\SkillInterface;
use Hero\Entity\Interfaces\Character;
use Hero\Helper\Output;

class MagicShield extends AbstractSkill implements SkillInterface {

	protected $chance = 20;

	public function handle( Character $attacker, Character $defender, int &$damage ) {
		$originalDamage = $damage;
		$damage = round($damage / 2);
		Output::print($defender.' will activate a magic shield that will reduce the damage dealt by '.$attacker.' from '.$originalDamage.' to '.$damage);
	}
}
