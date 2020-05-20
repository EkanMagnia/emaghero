<?php 
class SkillResolverTest extends \Codeception\Test\Unit
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
    public function testSkillResolver()
    {
    	$service = new \Hero\Service\Skill\SkillResolverService();

    	$result = $service->getSkillsByNamespace('Hero\Service\Skill\AttackSkills');
    	$this->assertIsArray($result);

    	$this->assertInstanceOf(\Hero\Service\Skill\SkillInterface::class, $result[0]);

    }
}
