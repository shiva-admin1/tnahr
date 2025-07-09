<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OldRecord Entity
 *
 * @property int $id
 * @property int $document_subtype_id
 * @property string $volume_no
 * @property string $general_no
 * @property string $department
 * @property \Cake\I18n\FrozenDate $fromdate
 * @property \Cake\I18n\FrozenDate $todate
 * @property string $keyword_tag
 * @property string $file_path
 * @property bool $is_active
 * @property bool $is_verified
 * @property int|null $verified_by
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $updated_on
 *
 * @property \App\Model\Entity\DocumentSubtype $document_subtype
 */
class OldRecord extends Entity
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
    '*' => true
];

}
