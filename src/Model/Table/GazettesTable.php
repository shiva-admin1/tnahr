<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Laminas\Diactoros\UploadedFile;
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
class GazettesTable extends Table
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

        $this->setTable('gazettes');
        $this->setDisplayField('notification_no');
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
            ->notEmptyString('notification_no', 'Enter a Notification No.')
            ->requirePresence('notification_no');
       $validator
            ->notEmptyString('notification_date', 'Select the Notification Date.')
            ->requirePresence('notification_date');  
        
        $validator
            ->notEmptyString('gpart', 'Enter a GPart.')
            ->requirePresence('gpart'); 
        
       $validator
            ->notEmptyString('gsection', 'Select the GSection.')
            ->requirePresence('gsection');


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
