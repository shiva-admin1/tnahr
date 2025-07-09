<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class IfrRecordsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ifr_records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        // $this->belongsTo('Villages', [
        //     'foreignKey' => 'village_id',
        // ]);
    }
    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->notEmptyString('district_name', 'Enter a District Name.')
    //         ->requirePresence('district_name');

    //     $validator
    //         ->notEmptyString('taluk_name', 'Enter a Taluk Name.')
    //         ->requirePresence('taluk_name');
    //    $validator
    //         ->notEmptyString('village_name', 'Enter the Village Name.')
    //         ->requirePresence('village_name');  
        
    //     $validator
    //         ->notEmptyString('village_no', 'Enter a Village No.')
    //         ->requirePresence('village_no'); 
        
    //    $validator
    //         ->notEmptyString('title_deed_no', 'Enter  the Village Deed No.')
    //         ->requirePresence('title_deed_no');


    //     $validator
    //     ->notEmptyString('sheet_no', 'Enter a Sheet No.')
    //     ->requirePresence('sheet_no')
    //     ->minLength('sheet_no', 1)
    //     ->maxLength('sheet_no', 250);

    //     $validator
    //     ->notEmptyString('keyword_tag', 'Enter at least one keyword or tag.')
    //     ->requirePresence('keyword_tag')
    //     ->minLength('keyword_tag', 1); 

 
    //     $validator
    //     ->notEmptyFile('file_path', 'Upload IFR Enclosure')
    //     //->requirePresence('file_path')
    //     ->add('file_path', 'custom', [
    //         'rule' => function ($value, $context) {
    //             $file = $context['data']['file_path'];
    
    //             // Check if the file is uploaded successfully
    //             if ($file['error'] !== UPLOAD_ERR_OK) {
    //                 return false;
    //             }
    
    //             // Get the file type and size
    //             $fileType = mime_content_type($file['tmp_name']);
    //             $fileSize = $file['size'] / 1024 / 1024; // Convert to MB
    
    //             // Check if the file is a PDF and within size limits
    //             if ($fileType !== 'application/pdf' || $fileSize > 5) {
    //                 return false;
    //             }
    
    //             return true;
    //         },
    //         'message' => 'Upload a PDF file (max size 5MB).'
    //     ]);


    //     return $validator;
    // }
}