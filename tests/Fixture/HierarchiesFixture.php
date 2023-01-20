<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HierarchiesFixture
 */
class HierarchiesFixture extends TestFixture
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
                'parent_id' => 1,
                'lft' => 1,
                'rght' => 1,
                'type' => 1,
            ],
        ];
        parent::init();
    }
}
