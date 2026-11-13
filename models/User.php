<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property string $username
 * @property string $role
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $passport_number
 * @property int $status
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Cars[] $cars
 */
class User extends ActiveRecord implements IdentityInterface
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'middle_name', 'email', 'phone', 'address', 'password_reset_token', 'birth_date', 'gender', 'passport_number', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['username', 'auth_key', 'password_hash'], 'required'],
            [['address'], 'string'],
            [['birth_date', 'created_at', 'updated_at'], 'safe'],
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'username', 'role'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150],
            [['phone', 'passport_number'], 'string', 'max' => 30],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['passport_number'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'username' => 'Username',
            'role' => 'Role',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
            'passport_number' => 'Passport Number',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => 1]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $payload = \app\components\JwtAuth::decode($token);

        if (!$payload || empty($payload->uid)) {
            \Yii::error('JWT payload noto‘g‘ri yoki uid mavjud emas', 'jwt');
            return null;
        }

        \Yii::error('JWT UID: ' . $payload->uid, 'jwt');

        $user = static::findOne([
            'id' => $payload->uid,
            'status' => 1,
        ]);

        if (!$user) {
            \Yii::error('UID bo‘yicha faol foydalanuvchi topilmadi', 'jwt');
            return null;
        }

        \Yii::error('JWT user topildi: ' . $user->id, 'jwt');

        return $user;
    }

    public static function findByUsername($username)
    {
        return static::find()
            ->where(['username' => trim(strtolower($username)), 'status' => 1])
            ->one();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }


    public function getCars()
    {
        return $this->hasMany(Cars::class, ['user_id' => 'id']);
    }

}
