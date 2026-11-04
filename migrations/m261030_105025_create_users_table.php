<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m261030_105025_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->bigPrimaryKey(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'middle_name' => $this->string(100),
            'username' => $this->string(100)->notNull()->unique(),
            'email' => $this->string(150)->notNull()->unique(),
            'phone' => $this->string(30)->unique(),
            'password_hash' => $this->string()->notNull(),
            'birth_date' => $this->date(),
            'gender' => $this->string(20),
            'address' => $this->text(),
            'passport_number' => $this->string(30)->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
