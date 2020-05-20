<?php

namespace Hero\Entity;

use Hero\Entity\Interfaces\Character;

class Player extends AbstractCharacter implements Character {
	const MIN_HEALTH = 70, MAX_HEALTH = 100,
		MIN_STRENGTH = 70, MAX_STRENGTH = 80,
		MIN_DEFENCE = 45, MAX_DEFENCE = 55,
		MIN_SPEED = 40, MAX_SPEED = 50,
		MIN_LUCK = 10, MAX_LUCK = 30;

	public function __construct() {
		parent::__construct(
			self::MIN_HEALTH,
			self::MAX_HEALTH,
			self::MIN_STRENGTH,
			self::MAX_STRENGTH,
			self::MIN_DEFENCE,
			self::MAX_DEFENCE,
			self::MIN_SPEED,
			self::MAX_SPEED,
			self::MIN_LUCK,
			self::MAX_LUCK
		);
	}

}
