<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cars}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $brand_id
 * @property int $model_id
 * @property int $color_id
 * @property int|null $year
 * @property string|null $engine_number
 * @property int|null $mileage
 * @property int|null $seats
 * @property int|null $doors
 * @property float|null $price
 * @property string|null $description
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Brands $brands
 * @property Colors $colors
 * @property Models $models
 * @property User $users
 */
class Cars extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cars}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'engine_number', 'seats', 'doors', 'price', 'description', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['mileage'], 'default', 'value' => 0],
            [['status'], 'default', 'value' => 1],
            [['user_id', 'brand_id', 'model_id', 'color_id'], 'required'],
            [['user_id', 'brand_id', 'model_id', 'color_id', 'year', 'mileage', 'seats', 'doors', 'status'], 'default', 'value' => null],
            [['user_id', 'brand_id', 'model_id', 'color_id', 'year', 'mileage', 'seats', 'doors', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['engine_number'], 'string', 'max' => 100],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::class, 'targetAttribute' => ['brand_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Colors::class, 'targetAttribute' => ['color_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Models::class, 'targetAttribute' => ['model_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'brand_id' => 'Brand ID',
            'model_id' => 'Model ID',
            'color_id' => 'Color ID',
            'year' => 'Year',
            'engine_number' => 'Engine Number',
            'mileage' => 'Mileage',
            'seats' => 'Seats',
            'doors' => 'Doors',
            'price' => 'Price',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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

        $this->updated_at = $now;

        return true;
    }

    /**
     * Gets query for [[Brands]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasOne(Brands::class, ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[Colors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColors()
    {
        return $this->hasOne(Colors::class, ['id' => 'color_id']);
    }

    /**
     * Gets query for [[Models]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasOne(Models::class, ['id' => 'model_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
