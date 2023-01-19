<?php

namespace backend\controllers;

use common\models\Car;
use common\models\Options;
use common\models\CarImage;
use backend\models\UploadForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * CarController implements the CRUD actions for Car model.
 */
class CarController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {            
        if (in_array($action->id, ['upload-image', 'delete-image'])) {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Car models.
     *
     * @return string
     */

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Car::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Car model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Car model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Car();
        $model->save(); 

        $this->redirect(['update', 'id' => $model->id]);

        // $upload = new UploadForm();
        // $option = Options::findOne(['option_name' => 'usd_course']);
        // $usd_course = $option->option_value;

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {

        //         $upload->image = UploadedFile::getInstances($upload, 'image');

        //         if(!empty($upload->image) && $upload->validate()) {
        //             foreach ($upload->image as $file) {
        //                 $filename = sha1_file($file->tempName) . '.' . $file->extension;
        //                 $path = str_replace('/admin', '', \Yii::getAlias('@webroot')) . '/uploads/' . $filename;
        //                 $file->saveAs($path);
        //                 $image = new CarImage();

        //                 $image->car_id = $model->id;
        //                 $image->filename = $filename;
        //                 $image->save();
        //             }
        //         }

        //         return $this->redirect(['view', 'id' => $model->id]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        // return $this->render('create', [
        //     'model' => $model,
        //     'upload' => $upload,
        //     'usd_course' => $usd_course
        // ]);
    }

    /**
     * Updates an existing Car model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $upload = new UploadForm();
        $option = Options::findOne(['option_name' => 'usd_course']);
        $usd_course = $option->option_value;
        $images = CarImage::find()->where(['car_id' => $model->id])->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $upload->image = UploadedFile::getInstances($upload, 'image');

            if(!empty($upload->image) && $upload->validate()) {

                $images_to_delete = CarImage::findAll(['car_id' => $model->id]);

                foreach ($images_to_delete as $deleted) {
                    $deleted->delete();
                }
                
                foreach ($upload->image as $file) {
                    $filename = sha1_file($file->tempName) . '.' . $file->extension;
                    $path = str_replace('/admin', '', \Yii::getAlias('@webroot')) . '/uploads/' . $filename;
                    $file->saveAs($path);
                    $image = new CarImage();

                    $image->car_id = $model->id;
                    $image->filename = $filename;
                    $image->save();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'upload' => $upload,
            'images' => $images,
            'usd_course' => $usd_course,
        ]);
    }

    /**
     * Deletes an existing Car model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUploadImage() {
        // var_dump($_FILES);die;
        
        echo '{
           "error":null,
           "errorkeys":[
           ],
           "filenames":[
              "d09591c7ab284e49b4698d323e594edd__2016 GFF Booth Space Application 1.pdf",
              "fc16e07771eb4078a5ed3b69655a5780__Screenshot_1.png",
              "793cd3b3d0ae47e0ac3ce726cb68061c__Screenshot_2.png"
           ],
           "initialPreview":[
              "<span class=\"file-other-icon\"><i class=\"fa fa-file-pdf-o text-danger\" aria-hidden=\"true\"></i></span>",
              "<span class=\"file-other-icon\"><i class=\"fa fa-file-image-o text-info\" aria-hidden=\"true\"></i></span>",
              "<span class=\"file-other-icon\"><i class=\"fa fa-file-image-o text-info\" aria-hidden=\"true\"></i></span>"
           ],
           "initialPreviewConfig":[
              {
                 "caption":"2016 GFF Booth Space Application 1.pdf",
                 "width":"120px",
                 "size":312292,
                 "url":"/Attachments/Delete/d09591c7ab284e49b4698d323e594edd",
                 "key":0
              },
              {
                 "caption":"Screenshot_1.png",
                 "width":"120px",
                 "size":16715,
                 "url":"/Attachments/Delete/fc16e07771eb4078a5ed3b69655a5780",
                 "key":1
              },
              {
                 "caption":"Screenshot_2.png",
                 "width":"120px",
                 "size":46802,
                 "url":"/Attachments/Delete/793cd3b3d0ae47e0ac3ce726cb68061c",
                 "key":2
              }
           ],
           "append": true
        }';
    }

    public function actionDeleteImage() {
        // var_dump($_FILES);die;
        echo 'true';
    }

    /**
     * Finds the Car model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Car the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Car::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
