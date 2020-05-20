<?php


namespace Hero\Entity;


use Hero\Entity\Interfaces\Character;

/**
 * We can remove the abstract property if we want to use this class to define characters, or we can create a simple Character class that extends this one and we can insert automatically min and max attribute values.
 * Class AbstractCharacter
 * @package Hero\Entity
 * @author  George Olah <hello@georgeolah.com>
 */
abstract class AbstractCharacter implements Character {

	/**
	 * @var string
	 */
	protected $name = '';

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
	 * @param int $health
	 *
	 * @return $this
	 */
	public function setHealth( int $health ) {
		$this->health = $health;

		return $this;
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

	public function toArray(): array {
		return get_object_vars( $this );
	}

	public function toJson() {
		return json_encode( $this->toArray() );
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setName( string $name ) {
		$this->name = $name;

		return $this;
	}

	public function isDead() : bool {
		return $this->getHealth() <= 0;
	}

	public function __toString() {
		return $this->name;
	}

}
