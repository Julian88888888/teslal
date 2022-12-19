<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%options}}`.
 */
class m221218_054457_create_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%options}}', [
            'id' => $this->primaryKey(),
            'option_name' => $this->string(),
            'option_value' => $this->string(),
        ]);

        $this->insert('options', [
            'option_name' => 'usd_course',
            'option_value' => '60',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%options}}');
    }
}
