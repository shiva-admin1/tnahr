<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommunitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommunitiesTable Test Case
 */
class CommunitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CommunitiesTable
     */
    public $Communities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Communities',
        'app.Applicants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Communities') ? [] : ['className' => CommunitiesTable::class];
        $this->Communities = TableRegistry::getTableLocator()->get('Communities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Communities);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
