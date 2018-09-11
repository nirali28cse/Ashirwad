<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection".
 *
 * @property int $id
 * @property string $title
 * @property string $date_of_inspection
 * @property string $column_included column included in inspection
 * @property string $start_date
 * @property string $end_date
 * @property string $date_time
 */
class Inspection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inspection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','buyer_user_id', 'date_of_inspection', 'column_included', 'start_date', 'end_date'], 'required'],
            [['id'], 'integer'],
            [['date_time'], 'safe'],
            [['date_of_inspection', 'start_date', 'end_date'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'buyer_user_id' => 'Inspection For',
            'date_of_inspection' => 'Date Of Inspection',
            'column_included' => 'Column For Inspection',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'date_time' => 'Date Time',
        ];
    }
}
