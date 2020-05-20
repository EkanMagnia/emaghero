<?php 
class WildBeastTest extends \Codeception\Test\Unit
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
    public function testWildBeast()
    {
	    $player = new \Hero\Entity\WildBeast();
	    $player->setName( 'Smaug' );

	    $this->assertGreaterThanOrEqual(60, $player->getHealth());
	    $this->assertLessThanOrEqual(90, $player->getHealth());

	    $this->assertGreaterThanOrEqual(60, $player->getStrength());
	    $this->assertLessThanOrEqual(90, $player->getStrength());

	    $this->assertGreaterThanOrEqual(40, $player->getDefence());
	    $this->assertLessThanOrEqual(60, $player->getDefence());

	    $this->assertGreaterThanOrEqual(40, $player->getSpeed());
	    $this->assertLessThanOrEqual(60, $player->getSpeed());

	    $this->assertGreaterThanOrEqual(25, $player->getLuck());
	    $this->assertLessThanOrEqual(40, $player->getLuck());

	    $this->assertEquals('Smaug', $player->getName());

    }
}
