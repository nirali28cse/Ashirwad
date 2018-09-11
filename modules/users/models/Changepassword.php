<?php

namespace app\modules\Users\models;
use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $device_type
 * @property string $device_token
 * @property string $start_date
 * @property string $end_date
 * @property integer $program_id
 * @property integer $is_coach
 * @property string $facebook_id
 * @property string $season_start
 * @property string $season_end
 * @property string $peak_on_date
 */
class Changepassword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $new_password;
	public $reenter_password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['new_password','reenter_password'], 'required'],
			['reenter_password', 'compare', 'compareAttribute'=>'new_password', 'message'=>"Passwords don't match" ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'new_password' => 'New Password',
            'reenter_password' => 'Re-enter New Password',
        ];
    }
}
