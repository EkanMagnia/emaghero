<?php


namespace Hero\Service\Interfaces;


use Hero\Entity\Interfaces\BadNPC;
use Hero\Entity\Interfaces\Character;
use Hero\Entity\Player;

interface Battle {

	public function attack( Player $player, BadNPC $badNPC ) : Character;

}
