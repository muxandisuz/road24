<?php

namespace app\models;

use yii\db\ActiveRecord;

class Car extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cars}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'brand_id', 'model_id', 'color_id'], 'required'],
            [['user_id', 'year', 'mileage', 'seats', 'doors', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['engine_number'], 'string', 'max' => 100],
            [['user_id'], 'exist',
                'targetClass' => User::class,
                'targetAttribute' => ['user_id' => 'id'],
            ],
            [['year'], 'integer', 'min' => 1886, 'max' => (int)date('Y') + 1],
            [['mileage'], 'integer', 'min' => 0],
            [['seats', 'doors'], 'integer', 'min' => 1],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        return true;
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('CURRENT_TIMESTAMP'),
            ],
        ];
    }

    public function fields()
    {
        return [
            'id',
            'user_id',
            'brand_id',
            'model_id',
            'year',
            'color_id',
            'engine_number',
            'transmission',
            'mileage',
            'seats',
            'doors',
            'price',
            'description',
            'status',
            'created_at',
            'updated_at',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
