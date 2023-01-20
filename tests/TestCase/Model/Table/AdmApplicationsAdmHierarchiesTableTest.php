<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmApplicationsAdmHierarchiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmApplicationsAdmHierarchiesTable Test Case
 */
class AdmApplicationsAdmHierarchiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmApplicationsAdmHierarchiesTable
     */
    protected $AdmApplicationsAdmHierarchies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmApplicationsAdmHierarchies',
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
        $config = $this->getTableLocator()->exists('AdmApplicationsAdmHierarchies') ? [] : ['className' => AdmApplicationsAdmHierarchiesTable::class];
        $this->AdmApplicationsAdmHierarchies = $this->getTableLocator()->get('AdmApplicationsAdmHierarchies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmApplicationsAdmHierarchies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmApplicationsAdmHierarchiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdmApplicationsAdmHierarchiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
