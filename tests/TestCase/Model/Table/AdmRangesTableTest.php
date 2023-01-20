<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmRangesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmRangesTable Test Case
 */
class AdmRangesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmRangesTable
     */
    protected $AdmRanges;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('AdmRanges') ? [] : ['className' => AdmRangesTable::class];
        $this->AdmRanges = $this->getTableLocator()->get('AdmRanges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmRanges);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmRangesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdmRangesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
