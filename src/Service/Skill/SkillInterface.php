<?php
namespace Hero\Service\Skill;

use Hero\Entity\Interfaces\Character;
use Hero\Service\Interfaces\Luck;

interface SkillInterface {

	public function supports(Luck $luckService, Character $character) : bool ;

	public function handle(Character $attacker, Character $defender, int &$damage);
}
