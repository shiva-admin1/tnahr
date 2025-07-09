<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantsTable Test Case
 */
class ApplicantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantsTable
     */
    public $Applicants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Applicants',
        'app.Districts',
        'app.Communities',
        'app.Religions',
        'app.Genders',
        'app.Qualifications',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Applicants') ? [] : ['className' => ApplicantsTable::class];
        $this->Applicants = TableRegistry::getTableLocator()->get('Applicants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Applicants);

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
