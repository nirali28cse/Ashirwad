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
 * @property string $date_of_purchase
 * @property string $date_of_mfg
 * @property string $date_of_expiry
 * @property string $issue_date
 * @property int $total_in
 * @property int $total_out
 * @property int $balance total_in-total_out
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
            [['name', 'abbreviations','product_type_id', 'potency_id', 'quantity_type_id', 'total_in', 'total_out', 'balance','date_of_purchase', 'date_of_mfg', 'date_of_expiry'], 'required'],
            [['id', 'product_type_id', 'potency_id', 'quantity_type_id', 'total_in', 'total_out', 'balance'], 'integer'],
            [['date_of_purchase', 'date_of_mfg', 'date_of_expiry', 'issue_date', 'date_time'], 'safe'],
            [['name', 'abbreviations'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1],
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
            'product_type_id' => 'Product Type',
            'potency_id' => 'Potency',
            'quantity_type_id' => 'Quantity Type',
            'name' => 'Name',
            'abbreviations' => 'Abbreviations',
            'date_of_purchase' => 'Date Of Purchase',
            'date_of_mfg' => 'Date Of Mfg',
            'date_of_expiry' => 'Date Of Expiry',
            'issue_date' => 'Issue Date',
            'total_in' => 'Total In',
            'total_out' => 'Total Out',
            'balance' => 'Balance',
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
