<?php 
class MagicShieldTest extends \Codeception\Test\Unit
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
    public function testMagicShield()
    {
    	$magicShield = new \Hero\Service\Skill\DefenceSkills\MagicShield();
    	$damage = 30;

	    $player = new \Hero\Entity\Player();
	    $player->setName( 'Orderus' );
	    $wildBeast = new \Hero\Entity\WildBeast();
	    $wildBeast->setName( 'Smaug' );

	    $magicShield->handle($player, $wildBeast, $damage);
	    $this->assertEquals(15, $damage);

    }
}
