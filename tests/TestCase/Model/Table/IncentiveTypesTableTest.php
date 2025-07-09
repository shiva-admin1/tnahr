<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncentiveTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncentiveTypesTable Test Case
 */
class IncentiveTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncentiveTypesTable
     */
    public $IncentiveTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.IncentiveTypes',
        'app.IncentiveDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('IncentiveTypes') ? [] : ['className' => IncentiveTypesTable::class];
        $this->IncentiveTypes = TableRegistry::getTableLocator()->get('IncentiveTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncentiveTypes);

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
}
