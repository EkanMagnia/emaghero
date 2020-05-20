<?php

namespace Hero\Service\Skill;


use Hero\Entity\Interfaces\Character;
use Hero\Service\Interfaces\Luck;

abstract class AbstractSkill {

	/**
	 * @return int
	 */
	public function getChance(): int {
		return $this->chance;
	}

	public function supports( Luck $luckService, Character $character ): bool {
		return $luckService->willHit($this->getChance());
	}

}
