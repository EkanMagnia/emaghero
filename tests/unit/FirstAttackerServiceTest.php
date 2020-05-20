<?php 
class FirstAttackerServiceTest extends \Codeception\Test\Unit
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
    public function testSelectFirstAttacker()
    {
    	$service = new \Hero\Service\FirstAttackerService();

	    $player = new \Hero\Entity\Player();
	    $player->setName( 'Orderus' );
	    $wildBeast = new \Hero\Entity\WildBeast();
	    $wildBeast->setName( 'Smaug' );

	    $char = $service->getFirstAttacker($player, $wildBeast);

	    $this->assertInstanceOf(\Hero\Entity\Interfaces\Character::class, $char);
    }
}
