<?php
namespace Hero\Entity\Interfaces;

interface Character {

	public function getHealth(): int;

	public function getStrength(): int;

	public function getDefence() : int;

	public function getSpeed() : int;

	public function getLuck() : int;
}
