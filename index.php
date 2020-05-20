<?php

use Hero\Entity\Player;
use Hero\Helper\Output;
use Hero\Entity\WildBeast;
use Hero\Service\BattleService;
use Hero\Service\FirstAttackerService;

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require __DIR__ . '/vendor/autoload.php';

$player = new Player();
$player->setName( 'Orderus' );
$wildBeast = new WildBeast();
$wildBeast->setName( 'Smaug' );

Output::print( "Let's start the battle" );
Output::print( 'After battling with the daedra, giant spiders and basilisks for more than a hundred years, Orderus, the witcher from the house of the Wolf, now has the following stats:' );
Output::print( $player->toJson() );
Output::print( 'While sneaking through the elven woods of Emagia, under the trees with their ever-green leafs, Orderus encountered a powerful wild beast, with the following stats:' );
Output::print( $wildBeast->toJson() );
Output::print( 'The beast feels anger as a stranger treepasses her teritory and prepares to attack. ' );

$battle = new BattleService( new FirstAttackerService() );
$battle->attack($player, $wildBeast);

