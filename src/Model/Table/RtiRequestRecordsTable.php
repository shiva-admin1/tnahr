<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class RtiRequestRecordsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('rti_request_records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('DocumentTypes', [
            'foreignKey' => 'document_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RtiStatusLogs', [
            'foreignKey' => 'rti_request_record_id'
        ]);
        $this->belongsTo('DocumentSubtypes', [
            'foreignKey' => 'document_subtype_id',
        ]);
        $this->belongsTo('GoDepartments', [
            'foreignKey' => 'go_department_id',
        ]);
		 $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
        ]);
		 $this->belongsTo('Taluks', [
            'foreignKey' => 'taluk_id',
        ]);
    }
      public function validationDefault(Validator $validator)
    {
			$validator
            ->notEmptyString('rti_request_type_id', 'Select the request type.');
			$validator
                ->notEmptyString('document_type_id', 'Select the record type');
            $validator
                ->notEmptyString('processing_fee', 'Enter the Processing Fee');
            $validator
                ->notEmptyString('document_request', 'Select the Record Request Mode');
            $validator
                ->notEmptyString('applicant_name', 'Enter the Applicant Name');
            $validator
            ->notEmptyString('mobile_no', 'Enter the Mobile Number.');
            $validator
            ->notEmptyString('email', 'Enter the EmailID.')
            ->email('email', true, 'Please enter a valid email address');
            $validator
            ->notEmptyString('address', 'Enter the Address.');
            $validator
                ->notEmptyString('district_id', 'Select the District');
            $validator
                ->notEmptyString('taluk_id', 'Select the Taluk');
             $validator
            ->notEmptyString('pincode', 'Enter the Pincode.');
        return $validator;
    }
}