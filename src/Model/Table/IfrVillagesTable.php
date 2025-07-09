<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class IfrVillagesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ifr_villages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('IfrDistricts', [
            'foreignKey' => 'district_id',
            'joinType' => 'LEFT',
        ]);

        $this->belongsTo('IfrTaluks', [
            'foreignKey' => 'taluk_id',
            'joinType' => 'LEFT',
        ]);
    }
}
