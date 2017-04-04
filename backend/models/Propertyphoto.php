<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "propertyphoto".
 *
 * @property integer $id
 * @property integer $propertyid
 * @property string $imageurl
 * @property string $modificationdate
 * @property integer $isprimary
 * @property integer $isexists
 */
class Propertyphoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propertyphoto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid', 'isprimary', 'isexists'], 'integer'],
            [['imageurl', 'isprimary'], 'required'],
            [['modificationdate'], 'safe'],
            [['imageurl'], 'string', 'max' => 255],
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
            'imageurl' => 'Imageurl',
            'modificationdate' => 'Modificationdate',
            'isprimary' => 'Isprimary',
            'isexists' => 'Isexists',
        ];
    }
}
