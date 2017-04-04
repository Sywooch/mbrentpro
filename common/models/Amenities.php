<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "amenities".
 *
 * @property integer $id
 * @property integer $propertyid
 * @property integer $amenityid
 * @property integer $isexists
 */
class Amenities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amenities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid', 'amenityid', 'isexists'], 'integer'],
            [['amenityid'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propertyid' => 'Propertyid',
            'amenityid' => 'Amenityid',
            'isexists' => 'Isexists',
        ];
    }
}
