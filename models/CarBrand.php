<?php

namespace app\models;

use yii\db\ActiveRecord;

class CarBrand extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%car_brands}}';
    }
}
