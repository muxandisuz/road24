<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%models}}`.
 */
class m261104_095136_create_models_table extends Migration
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
        ]);

        $this->addForeignKey(
            'fk-models-brand_id',
            '{{%models}}',
            'brand_id',
            '{{%brands}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%models}}');
    }
}
