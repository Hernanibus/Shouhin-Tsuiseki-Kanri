<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmUsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmUsersTable Test Case
 */
class AdmUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmUsersTable
     */
    protected $AdmUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmUsers',
        'app.AdmHierarchies',
        'app.AdmDomains',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AdmUsers') ? [] : ['className' => AdmUsersTable::class];
        $this->AdmUsers = $this->getTableLocator()->get('AdmUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmUsers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmUsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdmUsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
