<?php


namespace Hero\Entity;


use Hero\Entity\Interfaces\Character;

abstract class AbstractCharacter implements Character {

	/** @var int */
	protected $health = 0;

	/** @var int */
	protected $strength = 0;

	/** @var int */
	protected $defence = 0;

	/** @var int */
	protected $speed = 0;

	/** @var int */
	protected $luck = 0;

	public function __construct(
		int $minHealth,
		int $maxHealth,
		int $minStrength,
		int $maxStrength,
		int $minDefence,
		int $maxDefence,
		int $minSpeed,
		int $maxSpeed,
		int $minLuck,
		int $maxLuck
	) {
		$this->health   = rand( $minHealth, $maxHealth );
		$this->strength = rand( $minStrength, $maxStrength );
		$this->defence  = rand( $minDefence, $maxDefence );
		$this->speed    = rand( $minSpeed, $maxSpeed );
		$this->luck     = rand( $minLuck, $maxLuck );
	}

	/**
	 * @return int
	 */
	public function getHealth(): int {
		return $this->health;
	}

	/**
	 * @return int
	 */
	public function getStrength(): int {
		return $this->strength;
	}

	/**
	 * @return int
	 */
	public function getDefence(): int {
		return $this->defence;
	}

	/**
	 * @return int
	 */
	public function getSpeed(): int {
		return $this->speed;
	}

	/**
	 * @return int
	 */
	public function getLuck(): int {
		return $this->luck;
	}

	public function toArray() : array {
		return get_object_vars($this);
	}

	public function toJson() {
		return json_encode($this->toArray());
	}

}
