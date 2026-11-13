<?php

use yii\db\Migration;

class m261111_053913_add_hexcode_to_colors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%colors}}', 'color_code', $this->string(20)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%colors}}', 'color_code');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m261111_053913_add_hexcode_to_colors cannot be reverted.\n";

        return false;
    }
    */
}
