<?php

namespace app\models;

use Yii;
use app\models\QuantityType;
use app\models\ProductType;
use app\models\Potency;
use app\models\Product;
use app\modules\users\models\Users;
/**
 * This is the model class for table "product_in".
 *
 * @property int $id
 * @property int $buyer_user_id self user id
 * @property int $seller_user_id seller user id
 * @property int $product_type_id
 * @property int $potency_id
 * @property int $quantity_type_id
 * @property int $product_id
 * @property int $total_qty
 * @property string $date_of_purchase
 * @property string $date_of_mfg
 * @property string $date_of_expiry
 * @property string $issue_date
 * @property string $notes
 * @property int $status
 * @property string $date_time
 */
class ProductIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buyer_user_id', 'seller_user_id', 'product_type_id', 'potency_id','date_of_purchase', 'date_of_mfg', 'date_of_expiry', 'issue_date', 'quantity_type_id', 'product_id', 'total_qty', 'status'], 'required'],
            [['buyer_user_id', 'seller_user_id', 'product_type_id', 'potency_id', 'quantity_type_id', 'product_id', 'total_qty', 'status'], 'integer'],
            [['notes'], 'string'],
            [['date_time'], 'safe'],
            [['date_of_purchase', 'date_of_mfg', 'date_of_expiry', 'issue_date'], 'string', 'max' => 255],
           // [['total_qty'], 'string', 'max' => 1],
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
            'product_out_id' => 'product_out_id',
            'buyer_user_id' => 'Buyer User',
            'seller_user_id' => 'Seller User',
            'product_type_id' => 'Product Type',
            'potency_id' => 'Potency',
            'quantity_type_id' => 'Quantity Type',
            'product_id' => 'Product',
            'total_qty' => 'Total Qty',
            'date_of_purchase' => 'Date Of Purchase',
            'date_of_mfg' => 'Date Of Mfg',
            'date_of_expiry' => 'Date Of Expiry',
            'issue_date' => 'Issue Date',
            'notes' => 'Notes (Optional)',
            'status' => 'Status',
            'date_time' => 'Date Time',
        ];
    }
	
	
  public function getBuyerUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'buyer_user_id']);
    }	
	
    public function getSellerUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'seller_user_id']);
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
	
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }	
	
    public function getProductOut()
    {
        return $this->hasOne(ProductOut::className(), ['id' => 'product_out_id']);
    }
}
