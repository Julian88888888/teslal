<?php
namespace console\controllers;
use yii\console\Controller;
use common\models\CarImage;

class ClearController extends Controller {
	
	public function actionIndex() {
		$files = array_diff(scandir(__DIR__.'/../../frontend/web/uploads/'), array('.', '..'));

		foreach ($files as $file) {
			if(!CarImage::findOne(['filename' => $file])) {
				unlink(__DIR__.'/../../frontend/web/uploads/'.$file);
			}
		}
	}

}