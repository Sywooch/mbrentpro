<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unitphoto".
 *
 * @property integer $id
 * @property integer $propertyid
 * @property integer $unitid
 * @property string $imageurl
 * @property string $modificationdate
 * @property integer $isprimary
 * @property integer $isexists
 */
class Unitphoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unitphoto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid', 'unitid', 'isprimary', 'isexists'], 'integer'],
            [['imageurl', 'modificationdate'], 'required'],
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
            'unitid' => 'Unitid',
            'imageurl' => 'Imageurl',
            'modificationdate' => 'Modificationdate',
            'isprimary' => 'Isprimary',
            'isexists' => 'Isexists',
        ];
    }
}
