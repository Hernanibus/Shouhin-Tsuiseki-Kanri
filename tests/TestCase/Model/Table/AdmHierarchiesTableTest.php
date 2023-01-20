<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmHierarchiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmHierarchiesTable Test Case
 */
class AdmHierarchiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmHierarchiesTable
     */
    protected $AdmHierarchies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmHierarchies',
        'app.AdmApplications',
        'app.AdmRanges',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AdmHierarchies') ? [] : ['className' => AdmHierarchiesTable::class];
        $this->AdmHierarchies = $this->getTableLocator()->get('AdmHierarchies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmHierarchies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmHierarchiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdmHierarchiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
