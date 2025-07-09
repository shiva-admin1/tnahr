<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyUnitLocationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyUnitLocationsTable Test Case
 */
class CompanyUnitLocationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyUnitLocationsTable
     */
    public $CompanyUnitLocations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CompanyUnitLocations',
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
        $config = TableRegistry::getTableLocator()->exists('CompanyUnitLocations') ? [] : ['className' => CompanyUnitLocationsTable::class];
        $this->CompanyUnitLocations = TableRegistry::getTableLocator()->get('CompanyUnitLocations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompanyUnitLocations);

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
