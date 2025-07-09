<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class OsrVillagesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('osr_villages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('OsrDistricts', [
            'foreignKey' => 'district_id',
            'joinType' => 'LEFT',
        ]);

        $this->belongsTo('OsrTaluks', [
            'foreignKey' => 'taluk_id',
            'joinType' => 'LEFT',
        ]);
    }
}
