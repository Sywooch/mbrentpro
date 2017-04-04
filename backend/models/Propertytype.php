<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "propertytype".
 *
 * @property integer $id
 * @property integer $propertyid
 * @property string $type
 * @property integer $isexists
 */
class Propertytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propertytype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid', 'isexists'], 'integer'],
            [['type'], 'required'],
            [['type'], 'string', 'max' => 100],
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
            'type' => 'Type',
            'isexists' => 'Isexists',
        ];
    }
}
