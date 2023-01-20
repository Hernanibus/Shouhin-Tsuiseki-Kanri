<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HierarchiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HierarchiesTable Test Case
 */
class HierarchiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HierarchiesTable
     */
    protected $Hierarchies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Hierarchies',
        'app.Domains',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Hierarchies') ? [] : ['className' => HierarchiesTable::class];
        $this->Hierarchies = $this->getTableLocator()->get('Hierarchies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Hierarchies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HierarchiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HierarchiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
