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
class FmbRecordsTable extends Table
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

        $this->setTable('fmb_records');
        $this->setDisplayField('survey_no');
        $this->setPrimaryKey('id');

        $this->belongsTo('DocumentSubtypes', [
            'foreignKey' => 'document_subtype_id',
            'joinType' => 'INNER',
        ]);
    }
 public function validationDefault(Validator $validator)
    {
         $validator
            ->notEmptyString('district_name', 'Enter a District Name.')
            ->requirePresence('district_name');
         $validator
            ->notEmptyString('taluk_name', 'Enter a Taluk Name.')
            ->requirePresence('taluk_name');
         $validator
            ->notEmptyString('village_name', 'Enter a Village Name.')
            ->requirePresence('village_name');
         $validator
            ->notEmptyString('village_no', 'Enter a Village No.')
            ->requirePresence('village_no');
        $validator
            ->notEmptyString('document_subtype_id', 'Select a Sub Category.')
            ->requirePresence('document_subtype_id');
        $validator
        ->notEmptyString('keyword_tag', 'Enter at least one keyword or tag.')
        ->requirePresence('keyword_tag')
        ->minLength('keyword_tag', 1); 
        
        $validator
		->notEmptyFile('uploadfile', 'Please Upload File')
		->add('uploadfile', 'custom', [
			'rule' => function ($value, $context) {
				$file = $context['data']['uploadfile'];

				 foreach ($files as $file) {
					// Check if the file is uploaded successfully
					if ($file['error'] !== UPLOAD_ERR_OK) {
						return false;
					}

					// Get the file type and size
					$fileType = mime_content_type($file['tmp_name']);
					$fileSize = $file['size'] / 1024 / 1024; // Convert to MB

					// Check if the file is not an image or exceeds size limits
					if (!in_array($fileType, ['image/jpeg', 'image/jpg', 'image/png', 'image/tif']) || $fileSize > 5) {
						return false;
					}
				}

				return true;
			},
			'message' => 'Upload a jpeg, jpg, png, or tif file ='.$fileSize.'= (max size 5MB).'
		]);



        return $validator;
    }
}
