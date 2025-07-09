<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VoterRecordsTable extends Table
{
    
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('voter_records');
        $this->setDisplayField('constituency_no');
        $this->setPrimaryKey('id');

         $this->belongsTo('DocumentSubtypes', [
            'foreignKey' => 'document_subtype_id',
            'joinType' => 'INNER',
        ]);
       
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmptyString('record_year', 'Enter a Record Year.')
            ->requirePresence('record_year');
        $validator
            ->notEmptyString('constituency_no', 'Enter a Constituency No.')
            ->requirePresence('constituency_no');
        $validator
            ->notEmptyString('constituency_name', 'Enter a Constituency.')
            ->requirePresence('constituency_name'); 
        $validator
            ->notEmptyString('document_subtype_id', 'Enter a Record Type.')
            ->requirePresence('document_subtype_id');              
        $validator
            ->notEmptyString('district_name', 'Enter a District Name.')
            ->requirePresence('district_name');

        $validator
            ->notEmptyString('taluk_name', 'Enter a Taluk Name.')
            ->requirePresence('taluk_name');
       $validator
            ->notEmptyString('village_name', 'Enter the Village Name.')
            ->requirePresence('village_name');  
        
     
        
      

        $validator
        ->notEmptyString('keyword_tag', 'Enter at least one keyword or tag.')
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