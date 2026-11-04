<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\debug\components\search\matchers\LowerThan;
use yii\web\IdentityInterface;
use app\components\JwtAuth;

class User extends ActiveRecord implements IdentityInterface
{
    public $password;

    public static function tableName()
    {
        return '{{%users}}';
    }

    public function rules()
    {
        return [
            [['username'], 'required'],

            [['password'], 'required', 'on' => 'register'],
            [['password'], 'string'],

            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 100],

            [['username', 'passport_number'], 'unique'],

            [['email'], 'email'],
            [['birth_date'], 'date', 'format' => 'php:Y-m-d'],
            [['address'], 'string'],
            [['status'], 'integer'],
            [['gender'], 'in', 'range' => ['male', 'female']],

            [['password'], 'safe'],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert) {
            $this->created_at = date('Y-m-d H:i:s');
        }

        $this->updated_at = date('Y-m-d H:i:s');

        return true;
    }

    public function fields()
    {
        return [
            'id',
            'first_name',
            'last_name',
            'middle_name',
            'username',
            'email',
            'phone',
            'birth_date',
            'gender',
            'address',
            'status',
            'created_at',
            'updated_at',
        ];
    }

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
        return $this->hasMany(Car::class, ['user_id' => 'id']);
    }
}
