<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "potency".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $date_time
 */
class Potency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'potency';
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
            [['status'], 'string', 'max' => 1],
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
