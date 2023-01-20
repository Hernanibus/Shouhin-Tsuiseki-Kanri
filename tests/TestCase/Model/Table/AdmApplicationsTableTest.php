<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmApplicationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmApplicationsTable Test Case
 */
class AdmApplicationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmApplicationsTable
     */
    protected $AdmApplications;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmApplications',
        'app.AdmHierarchies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AdmApplications') ? [] : ['className' => AdmApplicationsTable::class];
        $this->AdmApplications = $this->getTableLocator()->get('AdmApplications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmApplications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmApplicationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdmApplicationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
