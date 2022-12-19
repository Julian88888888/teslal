<?php
namespace console\controllers;
use yii\console\Controller;
use common\models\Options;
use common\models\Car;

class PriceController extends Controller {
	
	public function actionIndex() {
		$usd = Options::findOne(['option_name' => 'usd_course']);

		$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);  

	    if($data = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js', false, stream_context_create($arrContextOptions))) {
	    	$data = json_decode($data, true);

	    	$usd->option_value = (string)$data['Valute']['USD']['Value'];
	    	$usd->save();
	    }

	    $cars = Car::find()->all();

	    foreach ($cars as $car) {
	    	if(!empty($car->price_usd)) {
	    		$car->price_rub = (string)ceil((float)$car->price_usd * (float)$usd->option_value);
	    	}

	    	if(!empty($car->cash_usd)) {
	    		$car->cash_rub = (string)ceil((float)$car->cash_usd * (float)$usd->option_value);
	    	}

	    	if(!empty($car->leasing_usd)) {
	    		$car->leasing_rub = (string)ceil((float)$car->leasing_usd * (float)$usd->option_value);
	    	}

	    	$car->save();
	    }
	}
}