<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class AdminUsersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('admin_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
         $this->belongsTo('DepartmentSections', [
            'foreignKey' => 'department_section_id',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
        ]);
        $this->belongsTo('Taluks', [
            'foreignKey' => 'taluk_id',
        ]);
        $this->hasMany('OtpLogs', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SmsLogs', [
            'foreignKey' => 'user_id',
        ]);
    }

    public function validationDefault(Validator $validator)
{
   $validator
    ->notEmptyString('newpassword', 'Please enter a new password.')
    ->add('newpassword', 'custom', [
        'rule' => function ($value, $context) {
            $isValid = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/', $value);
            return (bool) $isValid;
        },
        'message' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.'
    ]);

    return $validator;
}

    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->integer('id')
    //         ->allowEmptyString('id', null, 'create');

    //     $validator
    //         ->scalar('username')
    //         ->maxLength('username', 255)
    //         ->requirePresence('username', 'create')
    //         ->notEmptyString('username')
    //         ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

    //     $validator
    //         ->scalar('password')
    //         ->maxLength('password', 255)
    //         ->requirePresence('password', 'create')
    //         ->notEmptyString('password');

    //     $validator
    //         ->scalar('name')
    //         ->maxLength('name', 255)
    //         ->requirePresence('name', 'create')
    //         ->notEmptyString('name');

    //     $validator
    //         ->scalar('mobile_no')
    //         ->maxLength('mobile_no', 10)
    //         ->allowEmptyString('mobile_no');

    //     $validator
    //         ->email('email')
    //         ->allowEmptyString('email');

    //     $validator
    //         ->scalar('address')
    //         ->allowEmptyString('address');

    //     $validator
    //         ->integer('mobile_verified')
    //         ->notEmptyString('mobile_verified');

    //     $validator
    //         ->integer('is_active')
    //         ->notEmptyString('is_active');

    //     $validator
    //         ->integer('created_by')
    //         ->allowEmptyString('created_by');

    //     $validator
    //         ->integer('updated_by')
    //         ->allowEmptyString('updated_by');

    //     $validator
    //         ->dateTime('created_date')
    //         ->requirePresence('created_date', 'create')
    //         ->notEmptyDateTime('created_date');

    //     $validator
    //         ->dateTime('modified_date')
    //         ->allowEmptyDateTime('modified_date');

    //     return $validator;
    // }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['district_id'], 'Districts'));
        $rules->add($rules->existsIn(['taluk_id'], 'Taluks'));

        return $rules;
    }
}