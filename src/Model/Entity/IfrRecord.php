<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IfrRecord Entity
 *
 * @property int $id
 * @property string $district_name
 * @property string $taluk_name
 * @property string $village_name
 * @property string $village_no
 * @property string $title_deed_no
 * @property string $sheet_no
 * @property string $keyword_tag
 * @property string $file_path
 * @property int|null $village_id
 * @property bool $is_active
 * @property bool $is_verified
 * @property int|null $verified_by
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $updated_on
 *
 * @property \App\Model\Entity\Village $village
 */
class IfrRecord extends Entity
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
        'district_name' => true,
        'taluk_name' => true,
        'village_name' => true,
        'village_no' => true,
        'title_deed_no' => true,
        'sheet_no' => true,
        'keyword_tag' => true,
        'file_path' => true,
        'village_id' => true,
        'is_active' => true,
        'is_verified' => true,
        'verified_by' => true,
        'created_by' => true,
        'created_on' => true,
        'updated_by' => true,
        'updated_on' => true,
        'village' => true,
    ];
}
