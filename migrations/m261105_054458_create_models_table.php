<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%models}}`.
 */
class m261105_054458_create_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%models}}', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk_models_brand_id',
            '{{%models}}',
            'brand_id',
            '{{%brands}}',
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
        $this->dropForeignKey('fk_models_brand_id', '{{%models}}');
        $this->dropTable('{{%models}}');
    }
}
