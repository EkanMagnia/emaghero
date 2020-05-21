<?php

namespace Hero\Service;

use Hero\Entity\Interfaces\BadNPC;
use Hero\Entity\Interfaces\Character;
use Hero\Entity\Player;
use Hero\Helper\Output;
use Hero\Service\Interfaces\Battle;
use Hero\Service\Interfaces\FirstAttacker;
use Hero\Service\Interfaces\Luck;
use Hero\Service\Interfaces\SkillResolver;

class BattleService implements Battle {

	/** @var FirstAttacker */
	protected $firstAttackerService;

	/** @var Luck */
	protected $luckService;

	/** @var SkillResolver */
	protected $skillResolver;

	/** @var int  */
	protected $maxTurns = 20;

	/**
	 * BattleService constructor.
	 *
	 * @param FirstAttacker $firstAttackerService
	 * @param Luck          $luckService
	 * @param SkillResolver $skillResolver
	 * @param int           $maxTurns
	 */
	public function __construct( FirstAttacker $firstAttackerService, Luck $luckService, SkillResolver $skillResolver, $maxTurns = 20 ) {
		$this->firstAttackerService = $firstAttackerService;
		$this->luckService = $luckService;
		$this->skillResolver = $skillResolver;
		$this->maxTurns = $maxTurns;
	}

	public function attack( Player $player, BadNPC $badNPC ) : Character {
		$turns = 0;
		$winner = null;

		$attackingForce = $this->firstAttackerService->getFirstAttacker( $player, $badNPC );
		$defendingForce = $attackingForce instanceof Player ? $badNPC : $player;

		Output::print( $attackingForce->getName() . ' will attack first because he has higher ' . $this->firstAttackerService->getReason() );

		while ($turns < $this->maxTurns) {
			$damage = $attackingForce->getStrength() - $defendingForce->getDefence();

			if ($this->luckService->willHit($defendingForce->getLuck()) === FALSE) {
				[ $attackingForce, $defendingForce ] = $this->switchPlayers( $attackingForce, $player, $badNPC );
				Output::print($attackingForce.' attacks '.$defendingForce.', but without any luck he misses his target.');
				continue;
			}

			//use defending skills
			if ($defendingForce instanceof Player) {
				$this->skillResolver->resolveDefenceSkills($this->luckService, $attackingForce, $defendingForce, $damage);
			}

			//use attacking skills
			if ($attackingForce instanceof Player) {
				$this->skillResolver->resolveAttackSkills($this->luckService, $attackingForce, $defendingForce, $damage);
			}

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
			$winner = $attackingForce->getHealth() > $defendingForce->getHealth() ? $attackingForce : $defendingForce;
			Output::print($winner.' is a better shape, because he has more health left. ('.$winner->getHealth().' points left)');
		}

		return $winner;

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
