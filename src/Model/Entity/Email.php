<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Email Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $enquiry
 * @property \Cake\I18n\FrozenTime|null $created
 * @property bool|null $sent
 * @property string $interested_talent
 * @property string $purpose
 * @property string $contact
 */
class Email extends Entity
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
        'name' => true,
        'email' => true,
        'contact'=>true,
        'enquiry' => true,
        'company_name'=>true,
        'purpose'=>true,
        'created' => true,
        'sent' => true,
        'interested_talent' => true
    ];
}
