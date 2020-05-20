<?php


namespace Hero\Service\Interfaces;

use Hero\Entity\Interfaces\Character;

interface SkillResolver {

	public function resolveAttackSkills(Luck $luckService, Character $attacker, Character $defender, int &$damage);

	public function resolveDefenceSkills(Luck $luckService, Character $attacker, Character $defender, int &$damage);

	public function getSkillsByNamespace($namespace) : array;
}
