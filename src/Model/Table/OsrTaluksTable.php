<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class OsrTaluksTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('osr_taluks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('OsrDistricts', [
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
