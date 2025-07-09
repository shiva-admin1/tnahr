<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class RtiRequestRecord extends Entity
{
   protected $_accessible = [
        'rti_request_type_id' => true,
        'document_type_id' => true,
        'processing_fee' => true,
        'document_request' => true,
        'applicant_name' => true,
        'created_on' => true,
        'created_by' => true,
        'modified_on' => true,
        'modified_by' => true,
        'mobile_no' => true,
        'email' => true,
        'address' => true,
        'district_id' => true,
        'taluk_id' => true,
        'pincode' => true,
    ];
}
