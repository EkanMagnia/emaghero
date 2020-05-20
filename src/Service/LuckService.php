<?php


namespace Hero\Service;


use Hero\Service\Interfaces\Luck;

class LuckService implements Luck {

	/**
	 * We can aproach luck in a simple manner by generating a number btw 0 and 100, and comparing it with the player's
	 * luck. For example, if the player luck is 30 and the generated number is <30, then we return true, otherwise
	 * false.
	 *
	 * However, I dislike that system because it is less random. Thus, the result is below.
	 *
	 * @param int $luckChance
	 *
	 * @return bool
	 */
	public function willHit( int $luckChance = 30 ): bool {
		$luckNumber    = rand( 1, 100 );
		$randomNumbers = [];

		for ( $i = 0; $i < $luckChance; $i ++ ) {
			do {
				$generated = rand( 1, 100 );
			} while ( in_array( $generated, $randomNumbers, TRUE ) );

			$randomNumbers[] = $generated;
		}

		return in_array( $luckNumber, $randomNumbers, TRUE );
	}
}
