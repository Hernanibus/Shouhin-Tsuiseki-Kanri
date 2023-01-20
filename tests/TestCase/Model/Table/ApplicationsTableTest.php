<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationsTable Test Case
 */
class ApplicationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationsTable
     */
    protected $Applications;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Applications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Applications') ? [] : ['className' => ApplicationsTable::class];
        $this->Applications = $this->getTableLocator()->get('Applications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Applications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ApplicationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
