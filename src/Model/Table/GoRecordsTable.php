<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Districts Model
 *
 * @property \App\Model\Table\ApplicantsTable&\Cake\ORM\Association\HasMany $Applicants
 *
 * @method \App\Model\Entity\District get($primaryKey, $options = [])
 * @method \App\Model\Entity\District newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\District[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\District|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\District saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\District patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\District[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\District findOrCreate($search, callable $callback = null, $options = [])
 */
class GoRecordsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('go_records');
        $this->setDisplayField('go_no');
        $this->setPrimaryKey('id');

         $this->belongsTo('DocumentSubtypes', [
            'foreignKey' => 'document_subtype_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('GoDepartments', [
            'foreignKey' => 'go_department_id',
            'joinType' => 'INNER',
        ]);
       
    }
    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->notEmptyString('document_subtype_id', 'Select a Record Type.')
    //         ->requirePresence('document_subtype_id');

    //     $validator
    //         ->notEmptyString('go_department_id', 'Enter a Department.')
    //         ->requirePresence('go_department_id');
    //    $validator
    //         ->notEmptyString('go_no', 'Enter the GO Number.')
    //         ->requirePresence('go_no');  
        
    //     $validator
    //         ->notEmptyString('go_date', 'Enter a GO Date.')
    //         ->requirePresence('go_date'); 
        
    //    $validator
    //         ->notEmptyString('abstract_subject', 'Enter  the GO Subject.')
    //         ->requirePresence('abstract_subject');      

    //     $validator
    //     ->notEmptyString('keyword_tag', 'Enter at least one keyword or tag.')
    //     ->requirePresence('keyword_tag')
    //     ->minLength('keyword_tag', 1); 

    //     $validator
    //     ->allowEmptyFile('document_path[1]')
    //     ->add('document_path[1]', 'custom', [
    //         'rule' => function ($value, $context) {
    //             echo 2;die;
    //             if (empty($value['tmp_name'])) {
    //                 // No file uploaded, so it's valid
    //                 return true;
    //             }

    //             // Check if the file is uploaded successfully
    //             if ($value['error'] !== UPLOAD_ERR_OK) {
    //                 return false;
    //             }

    //             // Get the file type and size
    //             $fileType = mime_content_type($value['tmp_name']);
    //             $fileSize = $value['size'] / 1024 / 1024; // Convert to MB

    //             // Check if the file is a PDF and within size limits
    //             return ($fileType === 'application/pdf' && $fileSize <= 5);
    //         },
    //         'message' => 'Upload a PDF file (max size 5MB).'
    //     ]);

    // $validator
    //     ->allowEmptyFile('document_path[2]')
    //     ->add('document_path[2]', 'custom', [
    //         'rule' => function ($value, $context) {
    //             if (empty($value['tmp_name'])) {
    //                 // No file uploaded, so it's valid
    //                 return true;
    //             }

    //             // Check if the file is uploaded successfully
    //             if ($value['error'] !== UPLOAD_ERR_OK) {
    //                 return false;
    //             }

    //             // Get the file type and size
    //             $fileType = mime_content_type($value['tmp_name']);
    //             $fileSize = $value['size'] / 1024 / 1024; // Convert to MB

    //             // Check if the file is a PDF and within size limits
    //             return ($fileType === 'application/pdf' && $fileSize <= 5);
    //         },
    //         'message' => 'Upload a PDF file (max size 5MB).'
    //     ]);




    //     return $validator;
    // }
}
