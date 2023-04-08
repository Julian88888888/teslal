<?php

use yii\db\Migration;

/**
 * Class m230408_172532_add_car_handlebar_field
 */
class m230408_172532_add_car_handlebar_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%car}}', 'is_custom_handlebar', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%car}}', 'is_custom_handlebar');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230408_172532_add_car_handlebar_field cannot be reverted.\n";

        return false;
    }
    */
}
