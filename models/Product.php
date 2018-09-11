<?php

namespace app\models;

use Yii;
use app\models\QuantityType;
use app\models\ProductType;
use app\models\Potency;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $product_type_id
 * @property int $potency_id
 * @property int $quantity_type_id
 * @property string $name full name
 * @property string $abbreviations short name
 * @property int $status
 * @property string $date_time
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_type_id', 'potency_id', 'quantity_type_id'], 'integer'],
            [['date_time'], 'safe'],
            [['name', 'abbreviations'], 'string', 'max' => 255],
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
            'product_type_id' => 'Product Type',
            'potency_id' => 'Potency',
            'quantity_type_id' => 'Quantity Type',
            'name' => 'Name',
            'abbreviations' => 'Abbreviations',
            'status' => 'Status',
            'date_time' => 'Date Time',
        ];
    }
	
    public function getPotency()
    {
        return $this->hasOne(Potency::className(), ['id' => 'potency_id']);
    }
		
    public function getProducttype()
    {
        return $this->hasOne(ProductType::className(), ['id' => 'product_type_id']);
    }
		
    public function getQuantitytype()
    {
        return $this->hasOne(QuantityType::className(), ['id' => 'quantity_type_id']);
    }
}
