<?php


namespace app\controllers;



use Yii;
use yii\web\Controller;
use app\models\forms\CalcForm;

class CalcController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'main';
        $model = new CalcForm;


        if ( count(Yii::$app->request->post()) > 0 && $model->load(Yii::$app->request->post()) ) {

            $model->params = json_decode($model->params, true);


           if( isset($model->params[array_key_last($model->params)]['calc']) ) {
               $model->routeCalc($model->params[array_key_last($model->params)]['calc']);
               $model->params = json_encode($model->params);
               return $this->render('index', ['model' => $model]);
           }

//            if($model->params[1]['step'] == 2) {
//                echo( $model->value );
//                die();
//            }

           $model->fixJson($model->value);
//
//            if($model->params[2]['step'] == 3) {
////                var_dump($model->params[2]);
////                echo('Успезх');
//                die();
//            }



           if( isset($model->params[array_key_last($model->params)]['calc']) ) {
                $model->routeCalculationVaribles($model->params[array_key_last($model->params)]['calc']);
           }

           $model->params = json_encode($model->params);


           return $this->render('index', ['model' => $model]);
        }

        $model->fixJson(0);
        $model->params = json_encode($model->params);
        return $this->render('index', ['model' => $model]);
    }
}