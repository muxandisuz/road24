<?php

namespace app\models;

use yii\db\ActiveRecord;

class PasswordResetToken extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%password_reset_tokens}}';
    }
}
