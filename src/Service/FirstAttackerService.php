<?php


namespace Hero\Service;


use Hero\Entity\Interfaces\Character;
use Hero\Service\Interfaces\FirstAttacker;

class FirstAttackerService implements FirstAttacker {

	/** @var string */
	protected $reason;

	/**
	 * The first attack is done by the player with the higher speed. If both players have the same speed,
	than the attack is carried on by the player with the highest luck.
	 *
	 * TODO: Question: what happens if the luck is equal? :D
	 *
	 * @param Character $character1
	 * @param Character $character2
	 *
	 * @return Character
	 */
	public function getFirstAttacker(Character $character1, Character $character2) : Character {
		if ($character1->getSpeed() < $character2->getSpeed()) {
			$this->setReason('speed');
			return $character2;
		} elseif ($character1->getSpeed() > $character2->getSpeed()) {
			$this->setReason('speed');
			return $character1;
		} else {
			$this->setReason('luck');
			return $character1->getLuck() >= $character2->getLuck() ? $character1 : $character2;
		}
	}

	/**
	 * @return string
	 */
	public function getReason(): string {
		return $this->reason;
	}

	/**
	 * @param string $reason
	 *
	 * @return $this
	 */
	public function setReason( $reason ) {
		$this->reason = $reason;

		return $this;
	}


}
