<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentType Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $modified_on
 * @property int $modified_by
 *
 * @property \App\Model\Entity\DocumentSubtype[] $document_subtypes
 */
class DocumentType extends Entity
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
        'code' => true,
        'is_active' => true,
        'created_on' => true,
        'created_by' => true,
        'modified_on' => true,
        'modified_by' => true,
        'document_subtypes' => true,
    ];
}
