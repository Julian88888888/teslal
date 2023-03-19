<?php

use yii\db\Migration;

/**
 * Class m230319_204542_presentation_add_rub_prices
 */
class m230319_204542_presentation_add_rub_prices extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%presentation}}', 'price_rub', $this->string());
        $this->addColumn('{{%presentation}}', 'price_nds_rub', $this->string());
        $this->addColumn('{{%presentation}}', 'cash_rub', $this->string());
        $this->addColumn('{{%presentation}}', 'leasing_rub', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%presentation}}', 'price_rub');
        $this->dropColumn('{{%presentation}}', 'price_nds_rub');
        $this->dropColumn('{{%presentation}}', 'cash_rub');
        $this->dropColumn('{{%presentation}}', 'leasing_rub');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230319_204542_presentation_add_rub_prices cannot be reverted.\n";

        return false;
    }
    */
}
