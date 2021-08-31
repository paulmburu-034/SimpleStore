<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Products;
use app\models\Reorder;

Class ReorderCheckController extends Controller{
	public function actionReorderCheck(){
		$product = Products::find()->all();
		foreach ($product as $key => $value) {
			if ($value->ReorderLevel >= $value->ProductQuantity && $value->Reordered == 0) {
				// code...
				$order = new Reorder;
				$order->ProductID = $value->ProductID;
				$order->Status = 'Open';

				$product_search = Products::findOne(['ProductID'=>$value->ProductID]);
				$product_search->ReorderStatus = 'Open';
				$product_search->Reordered = 1;
				if ( $order->save() && $product_search->save()) {
					continue;
				}
			}
		}
	}
}