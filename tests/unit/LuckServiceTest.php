<?php 
class LuckServiceTest extends \Codeception\Test\Unit
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
    public function testLuckSystem()
    {
    	$luck = new \Hero\Service\LuckService();

    	$result = $luck->willHit(100);
    	$this->assertTrue($result);

    	$result = $luck->willHit(0);
    	$this->assertFalse($result);

    	$result = $luck->willHit(30);
    	$this->assertIsBool($result);
    }
}
