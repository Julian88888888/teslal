<?php

use yii\db\Migration;

/**
 * Class m230225_145852_car_add_price_nds_field
 */
class m230225_145852_car_add_price_nds_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%car}}', 'price_nds_usd', $this->string());
        $this->addColumn('{{%car}}', 'price_nds_rub', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%car}}', 'price_nds_usd');
        $this->dropColumn('{{%car}}', 'price_nds_rub');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230225_145852_car_add_price_nds_field cannot be reverted.\n";

        return false;
    }
    */
}
