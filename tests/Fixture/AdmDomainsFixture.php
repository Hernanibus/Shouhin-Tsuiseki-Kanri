<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdmDomainsFixture
 */
class AdmDomainsFixture extends TestFixture
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
                'adm_hierarchy_id' => 1,
                'denomination' => 'Lorem ipsum dolor sit amet',
                'company_name' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ip',
                'country' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'primary_address' => 'Lorem ipsum dolor sit amet',
                'secondary_address' => 'Lorem ipsum dolor sit amet',
                'telephone' => 'Lorem ipsum dolor ',
                'fax' => 'Lorem ipsum dolor ',
                'web' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'contact' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-22',
                'modified' => '2022-04-22',
            ],
        ];
        parent::init();
    }
}
