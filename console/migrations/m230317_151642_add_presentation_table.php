<?php

use yii\db\Migration;

/**
 * Class m230317_151642_add_presentation_table
 */
class m230317_151642_add_presentation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%presentation}}', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer(),
            'is_constructor' => $this->boolean()->defaultValue(0),
            'model' => $this->string(),
            'modification' => $this->string(),
            'body_color' => $this->string(),
            'interior_color' => $this->string(),
            'disks' => $this->string(),
            'year' => $this->string(),

            'price_usd' => $this->string(),
            'price_nds_usd' => $this->string(),
            'cash_usd' => $this->string(),
            'leasing_usd' => $this->string(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

         $this->addForeignKey(
            'fk-presentation_car_id',
            'presentation',
            'car_id',
            'car',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-presentation_car_id',
            'presentation'
        );
        $this->dropTable('{{%presentation}}');
    }

}
