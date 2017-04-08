<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tenant_favorites".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $propertyid
 * @property string $created
 * @property string $updated
 */
class TenantFavorites extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tenant_favorites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'propertyid'], 'integer'],
            [['created', 'updated'], 'required'],
            [['created', 'updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'propertyid' => 'Propertyid',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
