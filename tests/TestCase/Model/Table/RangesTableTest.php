<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RangesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RangesTable Test Case
 */
class RangesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RangesTable
     */
    protected $Ranges;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ranges',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ranges') ? [] : ['className' => RangesTable::class];
        $this->Ranges = $this->getTableLocator()->get('Ranges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ranges);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RangesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
