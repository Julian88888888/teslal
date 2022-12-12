<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m221210_110748_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'condition' => $this->smallInteger()->defaultValue(10),
            'model' => $this->string(),
            'modification' => $this->string(),
            'body_color' => $this->smallInteger()->defaultValue(1),
            'interior_color' => $this->smallInteger()->defaultValue(1),
            'distance' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(30),
            'disks' => $this->string(),
            'year' => $this->string(),

            'price_usd' => $this->string(),
            'price_rub' => $this->string(),
            'cash_usd' => $this->string(),
            'cash_rub' => $this->string(),
            'leasing_usd' => $this->string(),
            'leasing_rub' => $this->string(),

            'seats' => $this->string(),
            'autopilot' => $this->string(),
            'drive' => $this->string(),
            'hundred_km' => $this->string(),
            'max_speed' => $this->string(),
            'milage' => $this->string(),
            'distance' => $this->string(),
            
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
