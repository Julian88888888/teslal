<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_image}}`.
 */
class m221230_063804_create_car_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_image}}', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer(),
            'filename' => $this->string()
        ]);

         $this->addForeignKey(
            'fk-car_image_car_id',
            'car_image',
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
            'fk-car_image_car_id',
            'car_image'
        );
        $this->dropTable('{{%car_image}}');
    }
}
