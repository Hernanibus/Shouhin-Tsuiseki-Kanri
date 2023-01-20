<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmRangeGroupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmRangeGroupsTable Test Case
 */
class AdmRangeGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmRangeGroupsTable
     */
    protected $AdmRangeGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmRangeGroups',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AdmRangeGroups') ? [] : ['className' => AdmRangeGroupsTable::class];
        $this->AdmRangeGroups = $this->getTableLocator()->get('AdmRangeGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmRangeGroups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmRangeGroupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
