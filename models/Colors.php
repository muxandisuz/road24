<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%colors}}".
 *
 * @property int $id
 * @property string $name
 * @property string|null $created_at
 *
 * @property Cars[] $cars
 */
class Colors extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%colors}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'default', 'value' => null],
            [['name'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'color_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'hex_code' => 'Hex Code',
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $now = date('Y-m-d H:i:s');

        if ($insert) {
            $this->created_at = $now;
        }

        return true;
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::class, ['color_id' => 'id']);
    }

}
