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
            [['user_id', 'brand', 'model'], 'required'],
            [['user_id', 'year', 'mileage', 'seats', 'doors', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['brand', 'model'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 50],
            [['engine_number'], 'string', 'max' => 100],
            [['currency'], 'string', 'max' => 10],
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

        if ($insert) {
            $this->created_at = time();
        }

        $this->updated_at = time();

        return true;
    }

    public function fields()
    {
        return [
            'id',
            'user_id',
            'brand',
            'model',
            'year',
            'color',
            'engine_number',
            'transmission',
            'mileage',
            'seats',
            'doors',
            'price',
            'currency',
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
