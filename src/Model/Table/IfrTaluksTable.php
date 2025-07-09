<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class IfrTaluksTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ifr_taluks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('IfrDistricts', [
            'foreignKey' => 'district_id',
            'joinType' => 'LEFT',
        ]);
        // $this->hasMany('AdminUsers', [
        //     'foreignKey' => 'taluk_id',
        // ]);
        // $this->hasMany('RtiRequestRecords', [
        //     'foreignKey' => 'taluk_id',
        // ]);
        // $this->hasMany('Users', [
        //     'foreignKey' => 'taluk_id',
        // ]);
    }
    public function validationDefault(Validator $validator)
    {

        $validator
            ->notEmptyString('district_id', 'Select District')
            ->requirePresence('district_id');
        $validator
            ->notEmptyString('name', 'Enter a Taluk Name.')
            ->requirePresence('name');




        return $validator;
    }
}
