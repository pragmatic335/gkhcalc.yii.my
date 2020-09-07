<?php


namespace app\controllers;


use Yii;
use yii\web\Controller;

class AjaxController extends Controller
{
    function actionTest()
    {
        if(Yii::$app->request->isAjax) {
            return ('<botton class="btn btn-primary">da</botton>');
        }
        return null;
    }
}