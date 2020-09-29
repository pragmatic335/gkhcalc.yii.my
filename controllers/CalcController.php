<?php


namespace app\controllers;



use app\models\forms\SubForm;
use Yii;
use yii\web\Controller;
use app\models\forms\CalcForm;

class CalcController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'main';
        $model = new CalcForm;
        $model->sub_model = new SubForm;

//        if(Yii::$app->request->post('SubForm')) {
//
//            $model->sub_model->load(Yii::$app->request->post());
//            $model->sub_model->validate();
//            echo $model->sub_model->tariff;
//            die();
//        }
//
//
//
//
//        if (count(Yii::$app->request->post()) > 0 && $model->load(Yii::$app->request->post()) && $model->validate()) {
//            $model->params = json_decode( $model->params, true);
//
//            if (isset($model->params[array_key_last($model->params)]['calc'])) {
//                if($model->validate()) {
//                    $model->routeCalc($model->params[array_key_last($model->params)]['calc']);
//                    $model->params = json_encode($model->params);
//                    return $this->render('index', ['model' => $model]);
//                }
//            }
//
//
//                $model->fixJson($model->value);
//
//
//                if (isset($model->params[array_key_last($model->params)]['calc'])) {
//                    $model->sub_model->routeCalculationVaribles($model->params[array_key_last($model->params)]['calc']);
//                }
//
//
//
//                $model->params = json_encode($model->params);
//
//
//
//                return $this->render('index', ['model' => $model]);
//            }

        if(count(Yii::$app->request->post()) > 0) {
            if($model->load(Yii::$app->request->post())) {
                if($model->validate()) {
                    $model->fixJson($model->value);
                    if (isset($model->params[array_key_last($model->params)]['calc'])) {
                        $model->sub_model = json_decode($model->sub_model, false);
                        var_dump($model->sub_model);
                        die();
                         $model->sub_model->routeCalculationVaribles($model->params[array_key_last($model->params)]['calc']);
                         $model->params = json_encode($model->params);
                         $model->sub_model = json_encode($model->params);
                         return $this->render('index', ['model' => $model]);
                    }
                    if (isset($model->params[array_key_last($model->params)]['result'])) {
                        if ($model->sub_model->load(Yii::$app->request->post())) {
                            if($model->sub_model->validate()) {
                                $model->sub_model->routeCalc($model->params[array_key_last($model->params)]['calc']);
                                $model->params = json_encode($model->params);
                                $model->sub_model = json_encode($model->params);
                                return $this->render('index', ['model' => $model]);
                            }
                        }
                    }
                    $model->params = json_encode($model->params);
                    $model->sub_model = json_encode($model->params);
                    return $this->render('index', ['model' => $model]);

                }
            }
        }



        $model->fixJson(0);
        $model->params = json_encode($model->params);
        $model->sub_model = json_encode($model->sub_model);
        return $this->render('index', ['model' => $model]);
    }
}