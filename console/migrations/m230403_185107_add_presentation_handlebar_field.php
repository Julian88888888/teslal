<?php

use yii\db\Migration;

/**
 * Class m230403_185107_add_presentation_handlebar_field
 */
class m230403_185107_add_presentation_handlebar_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%presentation}}', 'is_custom_handlebar', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%presentation}}', 'is_custom_handlebar');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230403_185107_add_presentation_handlebar_field cannot be reverted.\n";

        return false;
    }
    */
}
