<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmHierarchiesAdmRangesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmHierarchiesAdmRangesTable Test Case
 */
class AdmHierarchiesAdmRangesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmHierarchiesAdmRangesTable
     */
    protected $AdmHierarchiesAdmRanges;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmHierarchiesAdmRanges',
        'app.AdmRanges',
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
        $config = $this->getTableLocator()->exists('AdmHierarchiesAdmRanges') ? [] : ['className' => AdmHierarchiesAdmRangesTable::class];
        $this->AdmHierarchiesAdmRanges = $this->getTableLocator()->get('AdmHierarchiesAdmRanges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmHierarchiesAdmRanges);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmHierarchiesAdmRangesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdmHierarchiesAdmRangesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
