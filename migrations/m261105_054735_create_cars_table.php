<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 */
class m261105_054735_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'brand_id' => $this->bigInteger()->notNull(),
            'model_id' => $this->bigInteger()->notNull(),
            'color_id' => $this->bigInteger()->notNull(),
            'year' => $this->smallInteger(),
            'engine_number' => $this->string(100),
            'mileage' => $this->bigInteger()->defaultValue(0),
            'seats' => $this->smallInteger(),
            'doors' => $this->smallInteger(),
            'price' => $this->decimal(15, 2),
            'description' => $this->text(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-cars-user_id',
            '{{%cars}}',
            'user_id',
            '{{%users}}',
            'id',
            'set null',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cars-brand_id',
            '{{%cars}}',
            'brand_id',
            '{{%brands}}',
            'id'
        );

        $this->addForeignKey(
            'fk-cars-model_id',
            '{{%cars}}',
            'model_id',
            '{{%models}}',
            'id'
        );

        $this->addForeignKey(
            'fk-cars-color_id',
            '{{%cars}}',
            'color_id',
            '{{%colors}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-cars-user_id', '{{%cars}}');
        $this->dropForeignKey('fk-cars-brand_id', '{{%cars}}');
        $this->dropForeignKey('fk-cars-model_id', '{{%cars}}');
        $this->dropForeignKey('fk-cars-color_id', '{{%cars}}');
        $this->dropTable('{{%cars}}');
    }
}
