<?php

use yii\db\Migration;

/**
 * Class m230325_175556_add_column_image_sequence
 */
class m230325_175556_add_column_image_sequence extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn('{{%car_image}}', 'sequence', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%car_image}}', 'sequence');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230325_175556_add_column_image_sequence cannot be reverted.\n";

        return false;
    }
    */
}
