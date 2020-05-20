<?php
namespace Hero\Service\Skill\AttackSkills;

use Hero\Entity\Interfaces\Character;
use Hero\Helper\Output;
use Hero\Service\Skill\AbstractSkill;
use Hero\Service\Skill\SkillInterface;

class RapidStrike extends AbstractSkill implements SkillInterface {

	protected $chance = 10;

	public function handle( Character $attackingForce, Character $defendingForce, int &$damage ) {
		$newDamage = $attackingForce->getStrength() - $defendingForce->getDefence();

		$health = $defendingForce->getHealth() - $newDamage;
		$defendingForce->setHealth($health);

		Output::print($attackingForce.' uses his ability to rapid strike for an additional damage of '.$damage.'. '.$defendingForce.' has '.$defendingForce->getHealth().' health left.');
	}
}
