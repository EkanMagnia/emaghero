<?php 
class RapidStrikeTest extends \Codeception\Test\Unit
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
    public function testRapidStrike()
    {
	    $rapidStrike = new \Hero\Service\Skill\AttackSkills\RapidStrike();
	    $damage = 30;

	    $player = new \Hero\Entity\Player();
	    $player->setName( 'Orderus' );
	    $wildBeast = new \Hero\Entity\WildBeast();
	    $wildBeast->setName( 'Smaug' );

	    $healthLeft = $wildBeast->getHealth() - ($player->getStrength() - $wildBeast->getDefence());

	    $rapidStrike->handle($player, $wildBeast, $damage);

	    $this->assertEquals($healthLeft, $wildBeast->getHealth());

    }
}
