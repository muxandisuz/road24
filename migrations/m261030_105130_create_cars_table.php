<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 */
class m261030_105130_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'brand' => $this->string(100)->notNull(),
            'model' => $this->string(100)->notNull(),
            'year' => $this->smallInteger(),
            'color' => $this->string(50),
            'engine_number' => $this->string(100),
            'mileage' => $this->bigInteger()->defaultValue(0),
            'seats' => $this->smallInteger(),
            'doors' => $this->smallInteger(),
            'price' => $this->decimal(15, 2),
            'currency' => $this->string(10)->defaultValue('UZS'),
            'description' => $this->text(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars}}');
    }
}
