<?php

namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $status
 * @property int $is_admin
 * @property string $date_time
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email_id', 'password'], 'required'],
            [['date_time'], 'safe'],
			['email_id','email'],
            [['username'], 'string', 'max' => 200],
            [['email_id'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 255],
            [['authKey'], 'string', 'max' => 255],
            [['status', 'is_buyer_seller', 'is_admin'], 'integer', 'max' => 3],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_id' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
            'authKey' => 'authKey',
            'is_buyer_seller' => 'Is Buyer/Seller',
            'is_admin' => 'Is Admin',
            'date_time' => 'Date Time',
        ];
    }
	

	public static function findByUser($username) {
		$user = self::find()
				->where([
					"username" => $username
				])
				->one();
		if (!count($user)) {
			return null;
		}
		return $user;
	}
	 
	/**
	 * @inheritdoc
	 */
	public function getId() {
		return $this->id;
	}
	 
	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {
	    return $this->authKey;
	}
	 
	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {
		return $this->authKey === $authKey;
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $userType = null) {
	 
		$user = self::find()
				->where(["accessToken" => $token])
				->one();
		if (!count($user)) {
			return null;
		}
		return new static($user);
	}

	public static function findIdentity($id) {
		$user = self::find()
				->where([
					"id" => $id
				])
				->one();
		if (!count($user)) {
			return null;
		}
		return new static($user);
	}
		
	public static function findByUsername($username) {
		$user = self::find()
				->where([
					"username" => $username
				])
				->one();
		if (!count($user)) {
			return null;
		}
		return new static($user);
	}
		
	public function validatePassword($password) {

		return $this->password ===  md5($password);
	}	
		
		
}
