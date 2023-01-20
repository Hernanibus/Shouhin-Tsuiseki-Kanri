<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicationsFixture
 */
class ApplicationsFixture extends TestFixture
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
                'id' => '82427407-a0e7-489a-9222-82c8eaf49710',
                'denomination' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
