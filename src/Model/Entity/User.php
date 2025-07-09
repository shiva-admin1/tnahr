<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $role_id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string|null $mobile_no
 * @property string|null $email
 * @property string|null $address
 * @property int|null $district_id
 * @property int|null $taluk_id
 * @property int $mobile_verified
 * @property int $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Applicant[] $applicants
 * @property \App\Model\Entity\OtpLog[] $otp_logs
 * @property \App\Model\Entity\SmsLog[] $sms_logs
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'role_id' => true,
        'username' => true,
        'password' => true,
        'name' => true,
        'mobile_no' => true,
        'email' => true,
        'address' => true,
        'district_id' => true,
        'taluk_id' => true,
        'mobile_verified' => true,
        'is_active' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_date' => true,
        'modified_date' => true,
        'role' => true,
        'applicants' => true,
        'otp_logs' => true,
        'sms_logs' => true,
        'district' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
