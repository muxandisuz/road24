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
            'first_name' => $this->string(100),
            'last_name' => $this->string(100),
            'middle_name' => $this->string(100),
            'username' => $this->string(100)->notNull()->unique(),
            'email' => $this->string(150)->unique(),
            'phone' => $this->string(30),
            'address' => $this->string(100),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'birth_date' => $this->date(),
            'gender' => $this->string(20),
            'address' => $this->text(),
            'passport_number' => $this->string(30)->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->dateTime(),
            'created_by' => $this->bigInteger(),
            'updated_at' => $this->dateTime(),
            'updated_by' => $this->bigInteger(),
        ]);

        $this->insert('users', [
            'id' => 1,
            'username' => 'admin',
            'auth_key' => 'qSn5DH7kIedrNo1YXIpZFNz-f67qWF8U',
            'password_hash' => '$2a$12$QytRbB8e3Yd7uYv9BlK8D.WaF5kr84sEQ0BXzKbZOOVHp2v8xjava',
            'password_reset_token' => null,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_by' => 1,
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
