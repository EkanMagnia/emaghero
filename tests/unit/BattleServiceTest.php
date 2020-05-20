<?php 
class BattleServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAttackSystem()
    {
	    $battle = new \Hero\Service\BattleService( new \Hero\Service\FirstAttackerService(), new \Hero\Service\LuckService(), new \Hero\Service\Skill\SkillResolverService() );

	    $player = new \Hero\Entity\Player();
	    $player->setName( 'Orderus' );
	    $wildBeast = new \Hero\Entity\WildBeast();
	    $wildBeast->setName( 'Smaug' );
	    $winner = $battle->attack($player, $wildBeast);

	    $this->assertInstanceOf(\Hero\Entity\Interfaces\Character::class, $winner);
    }

    public function testSwitchingForces() {
	    $battle = new \Hero\Service\BattleService( new \Hero\Service\FirstAttackerService(), new \Hero\Service\LuckService(), new \Hero\Service\Skill\SkillResolverService() );

	    $player = new \Hero\Entity\Player();
	    $player->setName( 'Orderus' );
	    $wildBeast = new \Hero\Entity\WildBeast();
	    $wildBeast->setName( 'Smaug' );

	    [$char1, $char2] = $battle->switchPlayers($player, $player, $wildBeast);

	    $this->assertEquals('Smaug', $char1->getName());
	    $this->assertEquals('Orderus', $char2->getName());

    }
}
