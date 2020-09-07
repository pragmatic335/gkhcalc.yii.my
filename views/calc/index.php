<?php
use app\widgets\Form;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\forms\CalcForm */


?>




<div class="col-md-9">
<div class="panel-group" id="accordion">
    <div id="vertical-timeline" class="vertical-container dark-timeline">

        <?php

//        if(isset($model->calc_conf)) {
//            var_dump($model->calc_conf);
//            die();
//        }



        $array = json_decode($model->params, true);


        foreach($array as $json) {
            Form::begin(['config' => $json, 'model' => $model]);
            Form::end();
        }





        ?>


    </div>
</div>
</div>
<div class="col-md-3" style="position: fixed; left: 75%; top: 12.0%;">
    <div class="col-md-8 notes" >
        <h4 style="position: absolute; top: 15%;  line-height: 30px;">Здесь содержиться справочная информация касаемо отображаемого контента контента</h4>
    </div>
    <div class="col-md-4">
    </div>

</div>










