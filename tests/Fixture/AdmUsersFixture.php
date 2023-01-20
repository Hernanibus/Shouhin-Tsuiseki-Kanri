<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdmUsersFixture
 */
class AdmUsersFixture extends TestFixture
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
                'active' => 1,
                'adm_hierarchy_id' => 1,
                'real_family_name' => 'Lorem ipsum dolor sit amet',
                'real_name' => 'Lorem ipsum dolor sit amet',
                'denomination' => 'Lorem ipsum dolor sit amet',
                'adm_domain_id' => 1,
                'password' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
