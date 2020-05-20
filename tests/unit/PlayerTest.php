<?php 
class PlayerTest extends \Codeception\Test\Unit
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
    public function testPlayer()
    {

	    $player = new \Hero\Entity\Player();
	    $player->setName( 'Orderus' );

	    $this->assertGreaterThanOrEqual(70, $player->getHealth());
	    $this->assertLessThanOrEqual(100, $player->getHealth());

	    $this->assertGreaterThanOrEqual(70, $player->getStrength());
	    $this->assertLessThanOrEqual(80, $player->getStrength());

	    $this->assertGreaterThanOrEqual(45, $player->getDefence());
	    $this->assertLessThanOrEqual(55, $player->getDefence());

	    $this->assertGreaterThanOrEqual(40, $player->getSpeed());
	    $this->assertLessThanOrEqual(50, $player->getSpeed());

	    $this->assertGreaterThanOrEqual(10, $player->getLuck());
	    $this->assertLessThanOrEqual(30, $player->getLuck());

	    $this->assertEquals('Orderus', $player->getName());

    }
}
