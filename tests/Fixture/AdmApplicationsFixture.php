<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdmApplicationsFixture
 */
class AdmApplicationsFixture extends TestFixture
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
                'id' => '07274994-c64d-4930-a2bb-0aaa8db8fd7e',
                'denomination' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
