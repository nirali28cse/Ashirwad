<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quantity_type".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $date_time
 */
class QuantityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quantity_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['date_time'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'date_time' => 'Date Time',
        ];
    }
}
