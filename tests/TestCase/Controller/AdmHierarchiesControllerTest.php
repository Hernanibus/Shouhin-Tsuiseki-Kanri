<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\AdmHierarchiesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\AdmHierarchiesController Test Case
 *
 * @uses \App\Controller\AdmHierarchiesController
 */
class AdmHierarchiesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdmHierarchies',
        'app.AdmApplications',
        'app.AdmRanges',
        'app.AdmApplicationsAdmHierarchies',
        'app.AdmHierarchiesAdmRanges',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\AdmHierarchiesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\AdmHierarchiesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\AdmHierarchiesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\AdmHierarchiesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\AdmHierarchiesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
