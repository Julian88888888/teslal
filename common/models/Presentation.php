<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "presentation".
 *
 * @property int $id
 * @property int|null $car_id
 * @property int|null $is_constructor
 * @property string|null $model
 * @property string|null $modification
 * @property string|null $body_color
 * @property string|null $interior_color
 * @property string|null $disks
 * @property string|null $year
 * @property string|null $price_usd
 * @property string|null $price_nds_usd
 * @property string|null $cash_usd
 * @property string|null $leasing_usd
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Car $car
 */
//TODO: добавить абстрактный класс для Car и Presentation
class Presentation extends Car // \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentation';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'is_constructor', 'created_at', 'updated_at'], 'integer'],
            [['model', 'modification', 'body_color', 'interior_color', 'disks', 'year', 'price_usd', 'price_nds_usd', 'cash_usd', 'leasing_usd', 'price_rub', 'price_nds_rub', 'cash_rub', 'leasing_rub'], 'string', 'max' => 255],
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
            'is_constructor' => Yii::t('app', 'Is Constructor'),
            'model' => Yii::t('app', 'Model'),
            'modification' => Yii::t('app', 'Modification'),
            'body_color' => Yii::t('app', 'Body Color'),
            'interior_color' => Yii::t('app', 'Interior Color'),
            'disks' => Yii::t('app', 'Disks'),
            'year' => Yii::t('app', 'Year'),
            'price_usd' => Yii::t('app', 'Price Usd'),
            'price_nds_usd' => Yii::t('app', 'Price Nds Usd'),
            'cash_usd' => Yii::t('app', 'Cash Usd'),
            'leasing_usd' => Yii::t('app', 'Leasing Usd'),
            'price_rub' => Yii::t('app', 'Price Rub'),
            'price_nds_rub' => Yii::t('app', 'Price Nds Rub'),
            'cash_rub' => Yii::t('app', 'Cash Rub'),
            'leasing_rub' => Yii::t('app', 'Leasing Rub'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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

    public function getType() {
        $types_map = [
            'model_y' => [
                'long_range_rwd' => [
                    '19' => 'type1',
                    '20' => 'type2'
                ],
                'long_range_awd' => [
                    '19' => 'type1',
                    '20' => 'type2'
                ],
                'performance' => [
                    '21' => 'type3'
                ],
            ],

            'model_3' => [
                'long_range' => [
                    '18' => 'type1',
                    '19' => 'type2'
                ],
                'performance' => [
                    '20' => 'type3'
                ]
            ],

            'model_s' => [
                'long_range' => [
                    '19' => 'type1',
                    '21' => 'type2'
                ],
                'plaid' => [
                    '19' => 'type3',
                    '21' => 'type4'
                ]
            ],

            'model_x' => [
                'long_range' => [
                    '20' => 'type1',
                    '22' => 'type2'
                ],
                'plaid' => [
                    '20' => 'type3',
                    '22' => 'type4'
                ]
            ]
        ];

        if($this->car_id) {
            return 'type1';
        } elseif($this->model == 'cybertruck' || $this->model == 'roadster') {
            return '';
        }

        return $types_map[$this->model][$this->modification][$this->disks];
    }
}
