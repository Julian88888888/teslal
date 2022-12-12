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

    // public function actionConfigurator()
    // {
    //     return $this->render('overview.html');
    // }

    public function actionKatalogavto()
    {
        return $this->render('inventory.html');
    }

    public function actionSravnenie()
    {
        return $this->render('compare.html');
    }

    public function actionGetcars()
    {
        return $this->render('partials/catalogue');
    }
}
