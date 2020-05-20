<?php
namespace Hero\Entity\Interfaces;

interface Character {

	public function setName(string $name);

	public function getName() : string;

	public function getHealth(): int;

	public function getStrength(): int;

	public function getDefence() : int;

	public function getSpeed() : int;

	public function getLuck() : int;
}
