<?php

namespace Hero\Service\Interfaces;

use Hero\Entity\Interfaces\Character;

interface FirstAttacker {

	public function getFirstAttacker( Character $character1, Character $character2 ): Character;

	public function getReason(): string;

}
