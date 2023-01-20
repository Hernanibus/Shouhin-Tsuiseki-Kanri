<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RangesFixture
 */
class RangesFixture extends TestFixture
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
                'denomination' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
