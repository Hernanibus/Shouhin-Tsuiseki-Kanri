<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdmApplicationsAdmHierarchiesFixture
 */
class AdmApplicationsAdmHierarchiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'adm_application_id' => 'Lor',
                'adm_hierarchy_id' => 1,
            ],
        ];
        parent::init();
    }
}
