<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%password_reset_tokens}}`.
 */
class m261109_101122_create_password_reset_tokens_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%password_reset_tokens}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'token_hash' => $this->string(64)->notNull(),
            'expires_at' => $this->timestamp()->notNull(),
            'used_at' => $this->timestamp()->null(),
            'created_at' => $this->timestamp()->notNull(),
        ]);

        $this->createIndex(
            'idx-password-reset-token-hash',
            '{{%password_reset_tokens}}',
            'token_hash',
            true
        );

        $this->addForeignKey(
            'fk-password-reset-user',
            '{{%password_reset_tokens}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%password_reset_tokens}}');
    }
}
