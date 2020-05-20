<?php


namespace Hero\Service\Interfaces;


interface Luck {
	public function willHit(int $luckChance = 30) : bool;
}
