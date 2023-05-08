<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Media Entity
 *
 * @property int $id
 * @property string $filename
 * @property string|null $filepath
 * @property int $talent_id
 *
 * @property \App\Model\Entity\Talent $talent
 */
// ======= THIS ENTITY IS NOT CURRENTLY BEING USED ======= //
class Media extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'filename' => true,
        'filepath' => true,
        'talent_id' => true,
        'talent' => true,
    ];
}