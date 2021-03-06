<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $title
 * @property integer $stateid
 * @property string $created
 * @property string $updated
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created', 'updated'], 'required'],
            [['stateid'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'stateid' => 'State',
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
