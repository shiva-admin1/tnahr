<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Laminas\Diactoros\UploadedFile;
class BookRecordsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('book_records');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('DocumentSubtypes', [
            'foreignKey' => 'document_subtype_id',
            'joinType' => 'INNER',
        ]);
    }
    // src/Model/Entity/Book.php


      public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmptyString('document_subtype_id', 'Select a record type.')
            ->requirePresence('document_subtype_id');

        $validator
            ->notEmptyString('title', 'Enter a title.')
            ->requirePresence('title')
            ->maxLength('title', 250);
                
            $validator
        ->allowEmptyString('author')
        ->add('author', 'notEmpty', [
            'rule' => 'notEmpty',
            'message' => 'Enter an author'
        ]);

        $validator
            ->notEmptyString('subject', 'Enter a subject.')
            ->requirePresence('subject')
            ->minLength('subject', 1)
            ->maxLength('subject', 250);

        $validator
            ->notEmptyString('publication_year', 'Enter the year of publication.')
            ->requirePresence('publication_year')
            ->minLength('publication_year', 1);

        $validator
            ->notEmptyString('accession_no', 'Enter an accession number.')
            ->requirePresence('accession_no');

        $validator
            ->notEmptyString('catalogue_no', 'Enter a catalogue number.')
            ->requirePresence('catalogue_no');

          $validator
        ->allowEmptyString('publisher_name')
        ->add('publisher_name', 'notEmpty', [
            'rule' => 'notEmpty',
            'message' => 'Enter a publisher name.'
        ]);


        $validator
            ->notEmptyString('keyword_tag', 'Enter at least one keyword or tag.')
            ->requirePresence('keyword_tag')
            ->minLength('keyword_tag', 1); 
        $validator
        ->notEmptyFile('file_path', 'Upload Book Enclosure')
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