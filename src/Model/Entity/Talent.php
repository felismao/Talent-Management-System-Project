<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Talent Entity
 *
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property int|null $minagerange
 * @property int|null $maxagerange
 * @property int|null $height
 * @property string|null $location
 * @property string|null $bio
 * @property string|null $featurephoto
 * @property string|null $location_id
 * @property string|null $email
 *  @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Media[] $media
 */
class Talent extends Entity
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
    // prepare all the talent variables
    protected $_accessible = [
        'name' => true,
        'firstname' => true,
        'lastname' => true,
        'gender' => true,
        'agerangeone' => true,
        'agerangetwo' => true,
        'agerangethree' => true,
        'height' => true,
        'location' => true,
        'bio' => true,
        'featurephoto' => true,
        'category'=>true,
        'categorytwo'=>true,
        'categorythree'=>true,
        'medias' => true,
        'location_id'=>true,
        'passport'=>true,
        'licence'=>true,
        'email'=>true,
        'mobile'=>true,
        'car'=>true,
        'address'=>true,
        'suburb'=>true,
        'postcode'=>true,
        'dob'=>true,
        'tattoos'=>true,
        'piercing'=>true,
        'bodymod'=>true,
        'nudity'=>true,
        'differences'=>true,
        'hair'=>true,
        'eye'=>true,
        'dress'=>true,
        'experience'=>true,
        'availability'=>true,
        'mediaone'=>true,
        'mediatwo'=>true,
        'mediathree'=>true,
        'industryone'=>true,
        'industrytwo'=>true,
        'industrythree'=>true,
        'roleone'=>true,
        'roletwo'=>true,
        'rolethree'=>true,
    ];
}
