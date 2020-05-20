<?php


namespace Hero\Service\Skill;


use Hero\Entity\Interfaces\BadNPC;
use Hero\Entity\Interfaces\Character;
use Hero\Entity\Player;
use HaydenPierce\ClassFinder\ClassFinder;
use Hero\Service\Interfaces\Luck;
use Hero\Service\Interfaces\SkillResolver;

class SkillResolverService implements SkillResolver {

	public function resolveAttackSkills(Luck $luckService, Character $attacker, Character $defender, int &$damage) {
		$attackSkills = $this->getSkillsByNamespace('Hero\Service\Skill\AttackSkills');
		foreach ($attackSkills as $skill) {
			if ($skill->supports($luckService, $attacker)) {
				$skill->handle($attacker, $defender, $damage);
			}
		}
	}

	public function resolveDefenceSkills(Luck $luckService, Character $attacker, Character $defender, int &$damage) {
		$defenceSkills = $this->getSkillsByNamespace('Hero\Service\Skill\DefenceSkills');
		foreach ($defenceSkills as $skill) {
			if ($skill->supports($luckService, $defender)) {
				$skill->handle($attacker, $defender, $damage);
			}
		}

	}

	/**
	 * @param $namespace
	 *
	 * @return SkillInterface[]
	 * @throws \Exception
	 */
	public function getSkillsByNamespace($namespace) : array {
		$skills = ClassFinder::getClassesInNamespace($namespace);

		$validated = [];
		foreach ($skills as $skill) {
			$cls = new $skill;
			if ($cls instanceof SkillInterface) {
				$validated[] = $cls;
			}
		}

		return $validated;
	}
}
