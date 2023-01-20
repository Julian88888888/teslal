<?php

use yii\db\Migration;

/**
 * Class m230120_171503_car_image_add_compressed_field
 */
class m230120_171503_car_image_add_compressed_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%car_image}}', 'is_compressed', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%car_image}}', 'is_compressed');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230120_171503_car_image_add_compressed_field cannot be reverted.\n";

        return false;
    }
    */
}
