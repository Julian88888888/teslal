<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int|null $condition
 * @property string|null $model
 * @property string|null $modification
 * @property int|null $body_color
 * @property int|null $interior_color
 * @property string|null $distance
 * @property int|null $status
 * @property string|null $disks
 * @property string|null $year
 * @property string|null $price_usd
 * @property string|null $price_rub
 * @property string|null $cash_usd
 * @property string|null $cash_rub
 * @property string|null $leasing_usd
 * @property string|null $leasing_rub
 * @property string|null $seats
 * @property string|null $autopilot
 * @property string|null $drive
 * @property string|null $hundred_km
 * @property string|null $max_speed
 * @property string|null $milage
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['model', 'modification', 'distance', 'disks', 'year', 'price_usd', 'price_rub', 'cash_usd', 'cash_rub', 'leasing_usd', 'leasing_rub', 'seats', 'autopilot', 'drive', 'hundred_km', 'max_speed', 'milage', 'condition', 'body_color', 'interior_color', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'condition' => Yii::t('app', 'Condition'),
            'model' => Yii::t('app', 'Model'),
            'modification' => Yii::t('app', 'Modification'),
            'body_color' => Yii::t('app', 'Body Color'),
            'interior_color' => Yii::t('app', 'Interior Color'),
            'distance' => Yii::t('app', 'Distance'),
            'status' => Yii::t('app', 'Status'),
            'disks' => Yii::t('app', 'Disks'),
            'year' => Yii::t('app', 'Year'),
            'price_usd' => Yii::t('app', 'Price Usd'),
            'price_rub' => Yii::t('app', 'Price Rub'),
            'cash_usd' => Yii::t('app', 'Cash Usd'),
            'cash_rub' => Yii::t('app', 'Cash Rub'),
            'leasing_usd' => Yii::t('app', 'Leasing Usd'),
            'leasing_rub' => Yii::t('app', 'Leasing Rub'),
            'seats' => Yii::t('app', 'Seats'),
            'autopilot' => Yii::t('app', 'Autopilot'),
            'drive' => Yii::t('app', 'Drive'),
            'hundred_km' => Yii::t('app', 'Hundred Km'),
            'max_speed' => Yii::t('app', 'Max Speed'),
            'milage' => Yii::t('app', 'Milage'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getModelName() {
        $models = [
            'model_s' => 'Model S',
            'model_x' => 'Model X',
            'model_y' => 'Model Y',
            'model_3' => 'Model 3',
            'cybertruck' => 'Cybertruck',
            'roadster' => 'Roadster'
        ];

        return $models[$this->model];
    }

    public function getModificationName() {
        $models = [
            'model_s' => 'Long Range',
            'model_x' => 'Long Range', 
            'plaid' => 'Plaid',
            'real_wheel_drive' => 'Rear-Wheel drive',
            'long_range' => 'Long Range',
            'long_range_awd' => 'Long Range AWD', 
            'performance' => 'Performance',
            'single_motor' => 'Single motor', 
            'dual_motor' => 'Dual motor',
            'tri_motor' => 'Tri motor',
            'four_motor' => 'Four motor'
        ];

        return $models[$this->modification];
    }

    public function getConditionName() {
        $models = [
            'new' => 'новая',
            'used' => 'с пробегом',
        ];

        return $models[$this->condition];
    }

    public function getBodyColorName() {
        $models = [
            'white' => 'белый', 
            'black' => 'черный', 
            'dark_grey' => 'темно-серый', 
            'light_grey' => 'светло-серый', 
            'red' => 'красный',
            'blue' => 'синий',
            'grey' => 'серый'
        ];

        return $models[$this->body_color];
    }

    public function getInteriorColorName() {
        $models = [
            'grey' => 'серый', 
            'black' => 'черный', 
            'white' => 'белый', 
            'brown' => 'бежевый',
            'tan' => 'коричневый'
        ];

        return $models[$this->interior_color];
    }

    public function getDriveName() {
        $models = [
            'full' => 'полный',
            'forward' => 'передний',
            'backward' => 'задний'
        ];

        return $models[$this->drive];
    }
}
