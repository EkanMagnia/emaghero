<?php

namespace Hero\Service;

use Hero\Entity\Interfaces\BadNPC;
use Hero\Entity\Interfaces\Character;
use Hero\Entity\Player;
use Hero\Helper\Output;
use Hero\Service\Interfaces\FirstAttacker;

class BattleService {

	/** @var FirstAttacker */
	protected $firstAttackerService;

	/**
	 * BattleService constructor.
	 *
	 * @param FirstAttacker $firstAttackerService
	 */
	public function __construct( FirstAttacker $firstAttackerService ) {
		$this->firstAttackerService = $firstAttackerService;
	}

	public function attack( Player $player, BadNPC $badNPC ) {
		$turns = 0;

		$attackingForce = $this->firstAttackerService->getFirstAttacker( $player, $badNPC );
		if ($attackingForce instanceof Player) {
			$defendingForce = $badNPC;
		} else {
			$defendingForce = $player;
		}

		Output::print( $attackingForce->getName() . ' will attack first because he has higher ' . $this->firstAttackerService->getReason() );

		$winner = null;

		while ($turns < 20) {
			$damage = $attackingForce->getStrength() - $defendingForce->getDefence();
			$health = $defendingForce->getHealth() - $damage;
			$defendingForce->setHealth($health);

			Output::print($attackingForce.' attacks '.$defendingForce.' and produces '.$damage.' damage points.'. $defendingForce.' has '.$health.' health points left after this round.');

			if ($defendingForce->isDead()) {
				$winner = $attackingForce;

				Output::print($defendingForce->getName().' is dead.'.$attackingForce->getName().' has won the battle and his victory will be sung in ballads in all the taverns from Emagia.');
				break;
			}

			[ $attackingForce, $defendingForce ] = $this->switchPlayers( $attackingForce, $player, $badNPC );

			$turns++;
		}

		if (!$winner instanceof Character) {
			Output::print('Both fighters are tired and can not continue to fight. No one won this battle.');
		}

	}

	public function switchPlayers(Character $attackingForce, Player $player, BadNPC $badNPC) {
		if ($attackingForce instanceof Player) {
			$attackingForce = $badNPC;
			$defendingForce = $player;
		} else {
			$attackingForce = $player;
			$defendingForce = $badNPC;
		}

		return [$attackingForce, $defendingForce];

	}

}
