<?php

namespace frontend\controllers;

use yii\helpers\Json;
use common\models\Promo;
use common\models\City;

class ApiController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Promo';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet_discount_info ($name = null) {
        if (!$name) {
            return null;
        }
        $p = Promo::find(['name' => $name])->where(['name' => $name])->all();
        return $p ? $p : null;
    }

    public function actionActivate_discount($name = null, $zone = null){
        if (!$name) {
            return null;
        }

        if (!$zone) {
            return null;
        }

        $z = City::findOne(['name' => $zone]);
        if (!$z) {
            return null;
        }

        $p = Promo::findOne(['name' => $name, 'city_id' => $z->id]);
        if (!$p) {
            return null;
        }

        if ($p->active) {
            return null;
        }

        $p->active = true;
        if ($p->save()) {
            return $p->sum;
        } else {
            return null;
        }
    }
}
