<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class DocumentSubtypesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('document_subtypes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('DocumentTypes', [
            'foreignKey' => 'document_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('BeicRecords', [
            'foreignKey' => 'document_subtype_id',
        ]);
        $this->hasMany('BookRecords', [
            'foreignKey' => 'document_subtype_id',
        ]);
        $this->hasMany('BpRecords', [
            'foreignKey' => 'document_subtype_id',
        ]);
        $this->hasMany('FmbRecords', [
            'foreignKey' => 'document_subtype_id',
        ]);
        $this->hasMany('Gazettes', [
            'foreignKey' => 'document_subtype_id',
        ]);
        $this->hasMany('GoRecords', [
            'foreignKey' => 'document_subtype_id',
        ]);
        $this->hasMany('VoterRecords', [
            'foreignKey' => 'document_subtype_id',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('document_type_id')
            ->requirePresence('document_type_id', 'create')
            ->notEmptyString('document_type_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 255)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');
        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['order_flag']));
        $rules->add($rules->existsIn(['document_type_id'], 'DocumentTypes'));

        return $rules;
    }
}