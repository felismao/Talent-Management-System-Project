<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MediasFixture
 */
class MediasFixture extends TestFixture
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
                'filename' => 'Lorem ipsum dolor sit amet',
                'filepath' => 'Lorem ipsum dolor sit amet',
                'talent_id' => 1,
            ],
        ];
        parent::init();
    }
}
