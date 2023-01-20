<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmDomainsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmDomainsTable Test Case
 */
class AdmDomainsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmDomainsTable
     */
    protected $AdmDomains;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmDomains',
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
        $config = $this->getTableLocator()->exists('AdmDomains') ? [] : ['className' => AdmDomainsTable::class];
        $this->AdmDomains = $this->getTableLocator()->get('AdmDomains', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdmDomains);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdmDomainsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdmDomainsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
