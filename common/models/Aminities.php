<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aminities".
 *
 * @property integer $id
 * @property integer $propertyid
 * @property integer $amenityid
 */
class Aminities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aminities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid', 'amenityid'], 'integer'],
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
        ];
    }
}
