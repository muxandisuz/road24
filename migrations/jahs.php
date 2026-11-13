<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 */
class jahs extends Migration
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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars}}');
    }
}
