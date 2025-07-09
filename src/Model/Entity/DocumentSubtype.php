<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentSubtype Entity
 *
 * @property int $id
 * @property int $document_type_id
 * @property string $name
 * @property string $code
 * @property int|null $order_flag
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $modified_on
 * @property int $modified_by
 *
 * @property \App\Model\Entity\DocumentType $document_type
 * @property \App\Model\Entity\BeicRecord[] $beic_records
 * @property \App\Model\Entity\BookRecord[] $book_records
 * @property \App\Model\Entity\BpRecord[] $bp_records
 * @property \App\Model\Entity\FmbRecord[] $fmb_records
 * @property \App\Model\Entity\Gazette[] $gazettes
 * @property \App\Model\Entity\GoRecord[] $go_records
 * @property \App\Model\Entity\VoterRecord[] $voter_records
 */
class DocumentSubtype extends Entity
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
        'document_type_id' => true,
		   'district_type' => true,
        'name' => true,
        'code' => true,
        'order_flag' => true,
        'is_active' => true,
        'created_on' => true,
        'created_by' => true,
        'modified_on' => true,
        'modified_by' => true,
        'document_type' => true,
        'beic_records' => true,
        'book_records' => true,
        'bp_records' => true,
        'fmb_records' => true,
        'gazettes' => true,
        'go_records' => true,
        'voter_records' => true,
    ];
}
