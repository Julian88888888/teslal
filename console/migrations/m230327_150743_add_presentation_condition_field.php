<?php

use yii\db\Migration;

/**
 * Class m230327_150743_add_presentation_condition_field
 */
class m230327_150743_add_presentation_condition_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%presentation}}', 'condition', $this->string()->defaultValue('new'));
        $this->addColumn('{{%presentation}}', 'milage', $this->string()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%presentation}}', 'condition');
        $this->dropColumn('{{%presentation}}', 'milage');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230327_150743_add_presentation_condition_field cannot be reverted.\n";

        return false;
    }
    */
}
