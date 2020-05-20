<?php


namespace Hero\Entity;


use Hero\Entity\Interfaces\BadNPC;
use Hero\Entity\Interfaces\Character;

class WildBeast extends AbstractCharacter implements Character, BadNPC {
	const MIN_HEALTH = 60, MAX_HEALTH = 90,
		MIN_STRENGTH = 60, MAX_STRENGTH = 90,
		MIN_DEFENCE = 40, MAX_DEFENCE = 60,
		MIN_SPEED = 40, MAX_SPEED = 60,
		MIN_LUCK = 25, MAX_LUCK = 40;

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
