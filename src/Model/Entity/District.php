<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * District Entity
 *
 * @property int $id
 * @property string $name
 * @property string $name_eng
 * @property string $code
 * @property bool $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_on
 *
 * @property \App\Model\Entity\Applicant[] $applicants
 */
class District extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'name_eng' => true,
        'code' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'applicants' => true,
    ];
}
