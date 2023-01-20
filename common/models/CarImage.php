<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_image".
 *
 * @property int $id
 * @property int|null $car_id
 *
 * @property Car $car
 */
class CarImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id'], 'integer'],
            [['filename'], 'string'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'car_id' => Yii::t('app', 'Car ID'),
            'filename' => Yii::t('app', 'Filename'),
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }

    public function beforeDelete()
    {

        if (!parent::beforeDelete()) {
            return false;
        }

        unlink(str_replace('/admin', '', \Yii::getAlias('@webroot')) . '/uploads/' . $this->filename);

        return true;
    }
}
