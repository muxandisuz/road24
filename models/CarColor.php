<?php

namespace app\models;

use yii\db\ActiveRecord;

class CarColor extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%car_colors}}';
    }
}
