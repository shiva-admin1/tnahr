<?php
namespace App\Test\TestCase\Controller;

use App\Controller\IncentiveDetailsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\IncentiveDetailsController Test Case
 *
 * @uses \App\Controller\IncentiveDetailsController
 */
class IncentiveDetailsControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
