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
 * @property string|null $price_nds_usd
 * @property string|null $price_nds_rub
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
            // [['model'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['model', 'modification', 'distance', 'disks', 'year', 'price_usd', 'price_rub', 'price_nds_usd', 'price_nds_rub', 'cash_usd', 'cash_rub', 'leasing_usd', 'leasing_rub', 'seats', 'autopilot', 'drive', 'hundred_km', 'max_speed', 'milage', 'condition', 'body_color', 'interior_color', 'status'], 'string', 'max' => 255],
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
            'price_nds_usd' => Yii::t('app', 'Price NDS Usd'),
            'price_nds_rub' => Yii::t('app', 'Price NDS Rub'),
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

    public function beforeDelete()
    {

        if (!parent::beforeDelete()) {
            return false;
        }

        foreach ($this->carImages as $image) {
            $image->delete();
        }

        return true;
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
        if($this->modification) {
            $models = [
                'model_s' => 'Long Range',
                'model_x' => 'Long Range', 
                'plaid' => 'Plaid',
                'real_wheel_drive' => 'Rear-Wheel drive',
                'long_range' => 'Long Range',
                'long_range_awd' => 'Long Range AWD', 
                'long_range_rwd' => 'Long Range RWD', 
                'performance' => 'Performance',
                'single_motor' => 'Single motor', 
                'dual_motor' => 'Dual motor',
                'tri_motor' => 'Tri motor',
                'four_motor' => 'Four motor'
            ];

            return $models[$this->modification];
        } else {
            return '';
        }
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
            'red' => 'красный',
            'blue' => 'синий',
            'silver' => 'серый'
        ];

        return $models[$this->body_color];
    }

    public function getInteriorColorName() {
        $models = [ 
            'black' => 'черный', 
            'white' => 'белый',
            'cream' => 'кремовый'
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

    public function getCarImages()
    {
        return $this->hasMany(CarImage::class, ['car_id' => 'id'])->
        orderBy(['sequence' => SORT_ASC]);
    }

    public function getParams()
    {
        $car_map = [
            'model_s' => [
                'plaid' => [
                    'drive' => 'Полный',
                    'power' => '1034',
                    'spin' => '1428',
                    'max_speed' => '322',
                    'acceleration' => '1.9',
                    'distance' => '628',
                    'battery' => '100',
                    'autopilot' => 'Есть'
                ],

                'long_range' => [
                    'drive' => 'Полный',
                    'power' => '670',
                    'spin' => '720',
                    'max_speed' => '238',
                    'acceleration' => '3.1',
                    'distance' => '648',
                    'battery' => '100',
                    'autopilot' => 'Есть'
                ],

                'options' => [
                    'Аудиосистема премиум-класса, специально настроенная для бесшумного салона Tesla',
                    'Передние сиденья с электрорегулировкой в 12 направлениях, памятью и поддержкой водительских профилей',
                    'Обогрев всех сидений и руля (зимний пакет)',
                    'Обогрев щеток стеклоочистителей и форсунок омывателя',
                    'Система фильтрации воздуха HEPA ',
                    'Музыка и мультимедиа через Bluetooth®',
                    'Светодиодные противотуманные фары',
                    'Тонированная стеклянная крыша с защитой от ультрафиолета и инфракрасного излучения',
                    'Боковые зеркала с подогревом, автоматическим затемнением и электроприводом',
                    'Пользовательские профили водителя',
                    '17-дюймовый сенсорный экран',
                    'Карты и навигационная система с бесплатными обновлениями в течение 7 лет',
                    'Система Keyless Entry',
                    'WiFi и подключение к Интернету',
                    'Удаленное управление при помощи мобильного приложения',
                    'Электростеклоподъемники с функцией автоматического поднятия/опускания',
                    'Камера заднего вида высокого разрешения',
                    'Система Hands-free',
                    'Голосовые команды для управления функциями',
                    'Радио FM/DAB+/Internet',
                    'Контурная подсветка салона LED',
                    'Наружная подсветка дверных ручек',
                    'Два USB-разъема для подключения медиа-устройств и подзарядки',
                    'Розетка 12 вольт',
                    'Багажные отделения в передней и задней частях кузова, складываемые задние сиденья в пропорции 60/40',
                    'Общий объем грузового пространства — 894 литра',
                    'Наружная подсветка дверных ручек',
                    'Умная пневмоподвеска с автоматической регулировкой клиренса на основе данных GPS',
                    'Электропривод крышки багажника',
                    'Звуковая система Premium с 12 неодимовыми динамиками',
                    'Интернет-браузер'
                ]
            ],

            'model_3' => [
                'real_wheel_drive' => [
                    'drive' => 'Задний',
                    'power' => '430',
                    'spin' => '389',
                    'max_speed' => '230',
                    'acceleration' => '5.8',
                    'distance' => '435',
                    'battery' => '90',
                    'autopilot' => 'Есть'
                ],

                'performance' => [
                    'drive' => 'Полный',
                    'power' => '513',
                    'spin' => '639',
                    'max_speed' => '261',
                    'acceleration' => '3.1',
                    'distance' => '504',
                    'battery' => '90',
                    'autopilot' => 'Есть'
                ],

                'long_range' => [
                    'drive' => 'Полный',
                    'power' => '498',
                    'spin' => '430',
                    'max_speed' => '233',
                    'acceleration' => '4,2',
                    'distance' => '572',
                    'battery' => '90',
                    'autopilot' => 'Есть'
                ],

                'options' => [
                    'Беспроводная зарядка для двух телефонов',
                    'Музыка и мультимедиа через Bluetooth®',
                    'Тонированная стеклянная крыша с защитой от ультрафиолета и инфракрасного излучения',
                    'Боковые зеркала с подогревом и электроприводом',
                    'WiFi и подключение к Интернету',
                    'Интернет-трансляция музыки и медиа в электромобиле',
                    'Интернет-браузер',
                    'Передние сиденья с электрорегулировкой в 12 направлениях, памятью и поддержкой водительских профилей',
                    'Обогрев всех сидений и руля (зимний пакет)',
                    'Звуковая система Premium-класса: 14 динамиков, 1 сабвуфер, 2 усилителя и иммерсивный звук',
                    'Светодиодные противотуманные фары',
                    'Салонные коврики',
                    'Обновление прошивки через Интернет с получением новых функций и улучшениями характеристик электромобиля',
                    'В комплекте Mobile Connector на 220V, Mennekes Type 2, переходник CCS',
                    'Комплект из двух ключей-карт',
                    'Система навигации с обновлением информации в реальном времени',
                    'Электропривод багажника',
                    'Доступ к приложению Tesla',
                    'Система Keyless Entry',
                    'Голосовые команды для управления функциями',
                    'Складываемые задние сиденья в пропорции 60/40',
                    'Самозатемняющиеся зеркала заднего вида'
                ]
            ],

            'model_x' => [
                'plaid' => [
                    'drive' => 'Полный',
                    'power' => '1020',
                    'spin' => '1034',
                    'max_speed' => '262',
                    'acceleration' => '2.5',
                    'distance' => '547',
                    'battery' => '100',
                    'autopilot' => 'Есть'
                ],

                'long_range' => [
                    'drive' => 'Полный',
                    'power' => '670',
                    'spin' => '660',
                    'max_speed' => '248',
                    'acceleration' => '3.8',
                    'distance' => '556',
                    'battery' => '100',
                    'autopilot' => 'Есть'
                ],

                'options' => [
                    'Обогрев щеток стеклоочистителей и форсунок омывателя',
                    'Система фильтрации воздуха HEPA ',
                    'Музыка и мультимедиа через Bluetooth®',
                    'Светодиодные противотуманные фары',
                    'Панорамное лобовое стекло с защитой от ультрафиолета и инфракрасного излучения',
                    'Боковые зеркала с подогревом, автоматическим затемнением и электроприводом',
                    'Пользовательские профили водителя',
                    '17-дюймовый сенсорный экран',
                    'Карты и навигационная система с бесплатными обновлениями в течение 7 лет',
                    'Система Keyless Entry',
                    'WiFi и подключение к Интернету',
                    'Удаленное управление при помощи мобильного приложения',
                    'Электростеклоподъемники с функцией автоматического поднятия/опускания',
                    'Камера заднего вида высокого разрешения',
                    'Система Hands-free',
                    'Голосовые команды для управления функциями',
                    'Радио FM/DAB+/Internet',
                    'Контурная подсветка салона LED',
                    'Наружная подсветка дверных ручек',
                    'Два USB-разъема для подключения медиа-устройств и подзарядки',
                    'Розетка 12 вольт',
                    'Автоматическое складывание задних сидений',
                    'Общий объем грузового пространства — до 2180 литров',
                    'Багажные отделения в передней и задней частях кузова, складываемые задние сиденья в пропорции 60/40',
                    'Наружная подсветка дверных ручек',
                    'Умная пневмоподвеска с автоматической регулировкой клиренса на основе данных GPS',
                    'Обновление прошивки через Интернет ',
                    'Система навигации с обновлением информации в реальном времени',
                    'Электропривод крышки багажника',
                    'Полностью автоматические передние двери'
                ]
            ],

            'model_y' => [
                'performance' => [
                    'drive' => 'Полный',
                    'power' => '571',
                    'spin' => '639',
                    'max_speed' => '248',
                    'acceleration' => '3.5',
                    'distance' => '514',
                    'battery' => '82',
                    'autopilot' => 'Есть'
                ],

                'long_range_awd' => [
                    'drive' => 'Полный',
                    'power' => '514',
                    'spin' => '527',
                    'max_speed' => '217',
                    'acceleration' => '4.8',
                    'distance' => '528',
                    'battery' => '90',
                    'autopilot' => 'Есть'
                ],

                'long_range_rwd' => [
                    'drive' => 'Полный',
                    'power' => '514',
                    'spin' => '527',
                    'max_speed' => '217',
                    'acceleration' => '4.8',
                    'distance' => '528',
                    'battery' => '90',
                    'autopilot' => 'Есть'
                ],

                'options' => [
                    'Пользовательские профили водителя',
                    'Центральная консоль с хранилищем',
                    'Беспроводная зарядка для двух телефонов',
                    'Боковые зеркала с подогревом и электроприводом',
                    'WiFi и подключение к Интернету',
                    'Передние сиденья с электрорегулировкой в 12 направлениях, памятью и поддержкой водительских профилей',
                    'Звуковая система Premium-класса: 14 динамиков, 1 сабвуфер, 2 усилителя и иммерсивный звук',
                    'Светодиодные противотуманные фары',
                    'Обновление прошивки через Интернет с получением новых функций и улучшениями характеристик электромобиля',
                    'В комплекте Mobile Connector на 220V, Mennekes Type 2, переходник CCS',
                    'Комплект из двух ключей-карт',
                    'Система навигации с обновлением информации в реальном времени',
                    'Электропривод багажника',
                    'Доступ к приложению Tesla',
                    'Пользовательские профили водителя',
                    'Четыре USB-разъема Type-C',
                    'Беспроводная зарядка для двух телефонов',
                    'Музыка и мультимедиа через Bluetooth®',
                    'Тонированная стеклянная крыша с защитой от ультрафиолета и инфракрасного излучения',
                    'Интернет-трансляция музыки и медиа в электромобиле',
                    'Интернет-браузер',
                    'Передние сиденья с электрорегулировкой в 12 направлениях, памятью и поддержкой водительских профилей',
                    'Обогрев всех сидений и руля (зимний пакет)',
                    'Светодиодные противотуманные фары',
                    'Автоматическое складывание задних сидений'
                ]
            ],

            'cybertruck' => [
                'single_motor' => [
                    'drive' => 'Задний',
                    'power' => '500',
                    'spin' => '-',
                    'max_speed' => '177',
                    'acceleration' => '6.6',
                    'distance' => '402',
                    'battery' => '100',
                    'autopilot' => 'Есть'
                ],

                'dual_motor' => [
                    'drive' => 'Полный',
                    'power' => '690',
                    'spin' => '-',
                    'max_speed' => '193',
                    'acceleration' => '4.5',
                    'distance' => '483',
                    'battery' => '120',
                    'autopilot' => 'Есть'
                ],

                'tri_motor' => [
                    'drive' => 'Полный',
                    'power' => '800',
                    'spin' => '-',
                    'max_speed' => '209',
                    'acceleration' => '2.9',
                    'distance' => '750',
                    'battery' => '200',
                    'autopilot' => 'Есть'
                ],

                'four_motor' => [
                    'drive' => '',
                    'power' => '',
                    'spin' => '',
                    'max_speed' => '',
                    'acceleration' => '',
                    'distance' => '',
                    'battery' => '',
                    'autopilot' => 'Есть'
                ],

                'options' => [
                    '6 мест в салоне',
                    'Сенсорный дисплей на панели управления',
                    'Багажное отделение закрывается на замок',
                    'Пневмо-подвеска',
                    'Возможность тянуть груз до 3,4 тонн',
                    'Интернет-браузер',
                    'WiFi и подключение к Интернету',
                    'Звуковая система Premium-класса',
                    'Доступ к приложению Tesla',
                    'Музыка и мультимедиа через Bluetooth®',
                    'Интернет-трансляция музыки и медиа в электромобиле',
                    'Автопилот'
                ]
            ],

            'roadster' => [
                'drive' => 'Полный',
                'power' => '1088',
                'spin' => '10000',
                'max_speed' => '400',
                'acceleration' => '1.9',
                'distance' => '1000',
                'battery' => '200',
                'autopilot' => 'Есть',  

                'options' => [
                    'Спортивные сидения',
                    'Спортивный руль как у болида',
                    'Интернет-браузер',
                    'WiFi и подключение к Интернету',
                    'Звуковая система Premium-класса',
                    'Превращается в кабриолет',
                    'Доступ к приложению Tesla',
                    'Музыка и мультимедиа через Bluetooth®',
                    'Интернет-трансляция музыки и медиа в электромобиле',
                    'Автопилот',
                    'Небольшое багажное отделение',
                    'Независимая передняя подвеска',
                    'Углекерамические тормозные диски'
                ]
            ]
        ];

        if($this->model == 'roadster') {
            $data = $car_map['roadster'];
        } else {
            $data =  $car_map[$this->model][$this->modification];
            $data['options'] = $car_map[$this->model]['options'];
        }

        return $data;
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

        // if($this->car_id) {
        //     return 'type1';
        // } elseif($this->model == 'cybertruck' || $this->model == 'roadster') {
        //     return '';
        // }

        return $types_map[$this->model][$this->modification][$this->disks];
    }
}
