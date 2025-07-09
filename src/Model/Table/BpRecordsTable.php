<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Laminas\Diactoros\UploadedFile;

class BpRecordsTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('bp_records');
        $this->setDisplayField('bp_no');
        $this->setPrimaryKey('id');

         $this->belongsTo('DocumentSubtypes', [
            'foreignKey' => 'document_subtype_id',
            'joinType' => 'INNER',
        ]);
       
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmptyString('document_subtype_id', 'Select a record type.')
            ->requirePresence('document_subtype_id');

        $validator
            ->notEmptyString('bp_no', 'Enter a BP NO.')
            ->requirePresence('bp_no');
                
     

        $validator
            ->notEmptyString('bp_date', 'Select the BP Date.')
            ->requirePresence('bp_date');
            
        $validator
            ->notEmptyString('abstract_subject', 'Enter a Abstract Subject.')
            ->requirePresence('abstract_subject')
            ->minLength('abstract_subject', 1)
            ->maxLength('abstract_subject', 250);

        $validator
        ->notEmptyString('keyword_tag', 'Enter at least one keyword or tag.')
        ->requirePresence('keyword_tag')
        ->minLength('keyword_tag', 1); 
        
       


    
        $validator
        ->notEmptyFile('file_path', 'Upload BP Enclosure')
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