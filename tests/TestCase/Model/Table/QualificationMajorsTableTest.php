<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualificationMajorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualificationMajorsTable Test Case
 */
class QualificationMajorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QualificationMajorsTable
     */
    public $QualificationMajors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.QualificationMajors',
        'app.Qualifications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('QualificationMajors') ? [] : ['className' => QualificationMajorsTable::class];
        $this->QualificationMajors = TableRegistry::getTableLocator()->get('QualificationMajors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QualificationMajors);

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
