<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Car;
use common\models\Presentation;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::class,
            //     'only' => ['logout', 'signup'],
            //     'rules' => [
            //         [
            //             'actions' => ['signup'],
            //             'allow' => true,
            //             'roles' => ['?'],
            //         ],
            //         [
            //             'actions' => ['logout'],
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            // 'captcha' => [
            //     'class' => \yii\captcha\CaptchaAction::class,
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            // ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index.html');
    }

    public function actionModels()
    {
        return $this->render('model.html');
    }

    public function actionModel3()
    {
        return $this->render('model3.html');
    }

    public function actionModelx()
    {
        return $this->render('modelx.html');
    }

    public function actionModely()
    {
        return $this->render('modely.html');
    }

    public function actionCybertruck()
    {
        return $this->render('cybertruck.html');
    }

    public function actionRoadster()
    {
        return $this->render('roadster.html');
    }

    public function actionSemi()
    {
        return $this->render('semi.html');
    }

    public function actionTestdrive()
    {
        return $this->render('drive.html');
    }

    public function actionZaryadki()
    {
        return $this->render('charging.html');
    }

    public function actionOverview()
    {
        return $this->render('overview.html');
    }

    public function actionKatalogavto()
    {
        return $this->render('inventory.html');
    }

    public function actionSravnenie()
    {
        return $this->render('compare.html');
    }
    public function actionCar()
    {
        return $this->render('car.html');
    }

    public function actionDesigns()
    {
        return $this->render('designs.html');
    }
    public function actionDesignx()
    {
        return $this->render('designx.html');
    }
    public function actionDesigny()
    {
        return $this->render('designy.html');
    }
    public function actionDesign3()
    {
        return $this->render('design3.html');
    }
    public function actionFeaturedefault()
    {
        return $this->render('feature_default.html');
    }

    public function actionFeature($id)
    {
        $car = Car::findOne($id);
        if($car) {
            return $this->render('feature', [
                'car' => $car
            ]);
        } else {
            $this->redirect('/404');
        }
    }

    public function actionPresentation($id)
    {
        $car = Car::findOne($id);
        
        if($car) {
            $presentation = new Presentation();
            
            $presentation->model = $car->model;
            $presentation->modification = $car->modification;
            $presentation->body_color = $car->body_color;
            $presentation->interior_color = $car->interior_color;
            $presentation->disks = $car->disks;
            $presentation->year = $car->year;

            $presentation->price_usd = $car->price_usd;
            $presentation->price_nds_usd = $car->price_nds_usd;
            $presentation->cash_usd = $car->cash_usd;
            $presentation->leasing_usd = $car->leasing_usd;

            $presentation->price_rub = $car->price_rub;
            $presentation->price_nds_rub = $car->price_nds_rub;
            $presentation->cash_rub = $car->cash_rub;
            $presentation->leasing_rub = $car->leasing_rub;

            $presentation->car_id = $car->id;

            $presentation->save();

            echo $this->render('presentation', [
                'car' => $car,
                'presentation' => $presentation
            ]);
        } else {
            $this->redirect('/404');
        }
    }

    public function actionPresentationdesign()
    {
        $presentation = new Presentation();
        
        $presentation->load(Yii::$app->request->get(), '');
        $presentation->is_constructor = 1;

        if($presentation->validate() && $presentation->save()) {
            echo $this->render('presentation', [
                'car' => $presentation,
                'presentation' => $presentation
            ]);
        } else {
            $this->redirect('/404');   
        }
    }

    public function actionGetcars()
    {
        $requestParams = \Yii::$app->getRequest()->getBodyParams(); // [1]
        if (empty($requestParams)) {
            $requestParams = \Yii::$app->getRequest()->getQueryParams(); // [2]
        }
        // $dataFilter = new \yii\data\ActiveDataFilter([
        //     'searchModel' => Car::class // [3]
        // ]);

        // if ($dataFilter->load($requestParams)) {
        //     $filter = $dataFilter->build(); // [4]
            
        //     if ($filter === false) { // [5]
        //         $cars = Car::find()->where($requestParams['filter'])->all();
        //         var_dump(Car::find()->where($requestParams['filter'])->createCommand()->rawSql);die;
        //         return $this->render('partials/catalogue', ['cars' => $cars]);
        //     }
        // }

        // $query = Car::find();

        // if (!empty($filter)) {
        //     $query->andWhere($filter); // [6]
        // }

        // $provider = new \yii\data\ActiveDataProvider([
        //     'query' => $query,
        //     // 'pagination' => [
        //     //     'params' => $requestParams,
        //     // ],
        //     'sort' => [
        //         'params' => $requestParams,
        //     ],
        // ]);
        $cars = Car::find()->where('model is not NULL AND model <> "" AND (model = "roadster" OR (modification is not NULL AND modification <> ""))');
        if(isset($requestParams['filter']))
            $cars->andWhere($requestParams['filter']);

        $cars = $cars->all();
        
        return $this->render('partials/catalogue', ['cars' => $cars]);
    }
}
