<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property integer $stateid
 * @property integer $cityid
 * @property string $dateofbirth
 * @property string $marital_status
 * @property string $gender
 * @property double $annual_income
 * @property integer $no_of_children
 * @property string $mobileno
 * @property string $address
 * @property string $email
 * @property string $password
 * @property integer $user_type_id
 * @property string $created
 * @property string $updated
 */
class TenantUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'address', 'email', 'password', 'user_type_id', 'created', 'updated'], 'required'],
            [['stateid', 'cityid', 'no_of_children', 'user_type_id'], 'integer'],
            [['dateofbirth', 'created', 'updated'], 'safe'],
            [['marital_status', 'gender'], 'string'],
            [['annual_income'], 'number'],
            [['firstname', 'lastname', 'email', 'password'], 'string', 'max' => 100],
            [['mobileno'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'stateid' => 'State',
            'cityid' => 'City',
            'dateofbirth' => 'Birthday',
            'marital_status' => 'Marital Status',
            'gender' => 'Gender',
            'annual_income' => 'Annual Income',
            'no_of_children' => 'No Of Children',
            'mobileno' => 'Mobile',
            'address' => 'Address',
            'email' => 'Email',
            'password' => 'Password',
            'user_type_id' => 'Type',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord)
            $this->created = $this->updated = date("Y-m-d H:i:s", time());
        else
            $this->updated = date("Y-m-d H:i:s", time());

        return parent::beforeSave($insert);
    }
}
