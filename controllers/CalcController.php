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

        if (count(Yii::$app->request->post()) > 0 && $model->load(Yii::$app->request->post())) {
            $model->params = json_decode( $model->params, true);

//            if($model->back_step == 1) {
//
//                echo $model->value;
//                foreach($model->params as $key=>$value) {
//                    echo $key.'--';
//                }
//                echo '<br>';
//                var_dump($model->params[2]);
////                var_dump($model->params[2]);
////                var_dump($model->params[array_key_last($model->params) - 1][$model->value]);
////                echo '<br>';
////                echo $model->value;
//
//
//                die();
//            }

            if (isset($model->params[array_key_last($model->params)]['calc'])) {
                if($model->validate()) {
                    $model->routeCalc($model->params[array_key_last($model->params)]['calc']);
                    $model->params = json_encode($model->params);
                    return $this->render('index', ['model' => $model]);
                }
            }


                $model->fixJson($model->value);


                if (isset($model->params[array_key_last($model->params)]['calc'])) {
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