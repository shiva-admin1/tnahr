<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncentiveDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncentiveDetailsTable Test Case
 */
class IncentiveDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncentiveDetailsTable
     */
    public $IncentiveDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.IncentiveDetails',
        'app.Users',
        'app.IndustryTypes',
        'app.IncentiveTypes',
        'app.CompanyUnitTypes',
        'app.CompanyUnitLocations',
        'app.CompanyTaluks',
        'app.CompanyDistricts',
        'app.CompanyStates',
        'app.FactoryTaluks',
        'app.FactoryDistricts',
        'app.FactoryStates',
        'app.Constitutions',
        'app.ProjectTypes',
        'app.Statuses',
        'app.IncentiveBuildingDetails',
        'app.IncentiveDocumentUploads',
        'app.IncentiveEcUploadDetails',
        'app.IncentiveEmployeeDetails',
        'app.IncentiveExistingAssets',
        'app.IncentiveGuarantors',
        'app.IncentiveMeansOfFinances',
        'app.IncentivePartners',
        'app.IncentivePlantMachineries',
        'app.IncentiveProjectCosts',
        'app.IncentiveShareholdings',
        'app.IncentiveStatuses',
        'app.IncentiveTermLoans',
        'app.LandLocationDetails',
        'app.YearwiseProductionSales',
        'app.YearwiseVatCstDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('IncentiveDetails') ? [] : ['className' => IncentiveDetailsTable::class];
        $this->IncentiveDetails = TableRegistry::getTableLocator()->get('IncentiveDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncentiveDetails);

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
