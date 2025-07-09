<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BeicRecordsTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('beic_records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('DocumentSubtypes', [
            'foreignKey' => 'document_subtype_id',
            'joinType' => 'INNER',
        ]);
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmptyString('document_subtype_id', 'Select a Record Type.')
            ->requirePresence('document_subtype_id');

        $validator
            ->notEmptyString('department', 'Enter a Department.')
            ->requirePresence('department');
       $validator
            ->notEmptyString('general_no', 'Enter the General No.')
            ->requirePresence('general_no');  
        
        $validator
            ->notEmptyString('volume_no', 'Enter a Volume No.')
            ->requirePresence('volume_no'); 
        
       $validator
            ->notEmptyString('fromdate', 'Enter  the From Date')
            ->requirePresence('fromdate');
       
       $validator
            ->notEmptyString('todate', 'Enter  the To Date')
            ->requirePresence('todate');

        $validator
        ->notEmptyString('keyword_tag', 'Enter  keyword or tag.')
        ->requirePresence('keyword_tag')
        ->minLength('keyword_tag', 1); 

 
        $validator
        ->notEmptyFile('file_path', 'Upload IFR Enclosure')
        //->requirePresence('file_path')
        ->add('file_path', 'custom', [
            'rule' => function ($value, $context) {
                $file = $context['data']['file_path'];
    
                // Check if the file is uploaded successfully
                if ($file['error'] !== UPLOAD_ERR_OK) {
                    return false;
                }
    
                // Get the file type and size
                $fileType = mime_content_type($file['tmp_name']);
                $fileSize = $file['size'] / 1024 / 1024; // Convert to MB
    
                // Check if the file is a PDF and within size limits
                if ($fileType !== 'application/pdf' || $fileSize > 5) {
                    return false;
                }
    
                return true;
            },
            'message' => 'Upload a PDF file (max size 5MB).'
        ]);


        return $validator;
    }
}

    