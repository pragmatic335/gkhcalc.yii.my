<?php

/** @var $this \yii\web\View */
/* @var $model \app\models\forms\CalcForm*/
use app\widgets\Form;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$step = count($array);//какой сейчас шаг

$count = 1;//определяем количество отображаемых элементов в выбираемом пункте
array_walk($config, function($value, $key) use (&$count)
{
    if(in_array($key, [1,2,3,4,5,6,7,8,9]))
        $count++;
});

$size = intdiv(12, $count);
$state = (isset($config['event']))? true: false;

$test = clone $model;

$test->params = json_encode($array);

    if($state == true && $step > 1) {

        $form = ActiveForm::begin(['id' => 'calcformback',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}{beginWrapper}{input}\n{error}{endWrapper}{hint}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-6',
                    'offset' => '',

                    'wrapper' => 'col-sm-4',
                    'error' => '',
                    'hint' => 'col-sm-2',
                ],
            ],
            'options' => ['class' => 'mytextsize']]);

        $modelStepBack = clone $model;

        $modelStepBack->params = json_decode($modelStepBack->params,true);
        if ($step == 2) {
            $modelStepBack->value = 111;
        }
        else {
            $currentStep = $modelStepBack->params[array_key_last($modelStepBack->params) - 1];
            unset($currentStep['choosename']);
            foreach($modelStepBack->params[array_key_last($modelStepBack->params) - 2] as $key=>$value) {
                if($currentStep == $value) {
                    $modelStepBack->value = $key;
                }
            }
            unset($modelStepBack->params[array_key_last($modelStepBack->params)]);
            unset($modelStepBack->params[array_key_last($modelStepBack->params)]);
        }
        $modelStepBack->params = json_encode($modelStepBack->params);
        ?>

        <div class="hide"><?= $form->field($modelStepBack, 'value', [
                'inputOptions' => [
                    'id' => 'calcform-valueback',
                ],
            ])->hiddenInput()->label(false); ?>
        </div>
        <div class="hide"><?= $form->field($modelStepBack, 'params', [
                'inputOptions' => [
                    'id' => 'calcform-paramsback',
                ],
            ])->hiddenInput()->label(false); ?>
        </div>
        <div class="hide"><?= $form->field($modelStepBack, 'back_step', [
                'inputOptions' => [
                    'id' => 'calcform-back_stepback',
                ],
            ])->hiddenInput()->label(false); ?>
        </div>


        <?php
        $q = "$(document).ready(function() {
        $('[id=backStep]').on('click', function() {
            $('#calcform-valueback').val($('#calcform-valueback').attr('value'));
            $('#calcform-paramsback').val($('#calcform-paramsback').attr('value'));
            $('#calcform-back_stepback').val(1);
            $('#calcformback').submit();               
        });     
    })";
        $this->registerJs($q);
        ActiveForm::end();
    }
    ?>

<?php
    $form = ActiveForm::begin(['id' => 'calcform' . $step,
        'layout' => 'horizontal',
        'fieldConfig' => [
                'template' => "{label}{beginWrapper}{input}\n{error}{endWrapper}{hint}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'offset' => '',

                'wrapper' => 'col-sm-4',
                'error' => '',
                'hint' => 'col-sm-2',
            ],
        ],
        'options' => ['class' => 'mytextsize']]);

 ?>

<div class="vertical-timeline-block">
    <div class="vertical-timeline-icon navy-bg">
        <i class="fa"><?= $step?></i>
    </div>
        <div class="vertical-timeline-content mytimeline">
            <div class="panel panel-default" style="border:0px;">
                <div class="panel-heading">
                    <h5 class="panel-title mytitle">
                        <?php
                        if(!$state) {
                            ?>
                            <i class="fa fa-check-circle fa-2x"></i>
                            <?= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                        <?php } ?>

                        <a  class="myclick mytextsize" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $step; ?>">
                            <?= Yii::t('app', $config['label']) ?>  <span style="font-weight: bolder;"><?= (!$state)? ' &mdash; ' . Yii::t('app',$config['choosename']) : '' ;?></span>
                        </a>

                    </h5>

                </div>
                <div id="collapse<?= $step; ?>" class="panel-collapse collapse <?= $state? 'in': '' ?>">
                    <div class="panel-body" style="min-height: 100px;">

                        <div class="hide"><?= $form->field( $test, 'value', [
                                'inputOptions' => [
                                    'id' => 'calcform-value' . $step,
                                ],
                            ] )->hiddenInput()->label(false); ?>
                        </div>

                        <div class="hide"><?= $form->field( $test, 'params', [
                                'inputOptions' => [
                                    'id' => 'calcform-params' . $step,
                                ],
                            ] )->hiddenInput()->label(false); ?>
                        </div>

                        <div class="hide"><?= $form->field( $test, 'calc_conf', [
                                'inputOptions' => [
                                    'id' => 'calcform-calc_conf' . $step,
                                ],
                            ] )->hiddenInput()->label(false); ?>
                        </div>

                        <?php
                        if($state == true && $step!= 1) {
                            ?>

                            <button id="backStep" type="button" class="btn btn-light myStepDown"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Назад</button>

                        <?php } ?>
                        <button class="btn btn-light myMainNote" type="button" data-toggle="collapse" data-target="#collapseTest<?= $step; ?>" aria-expanded="false" aria-controls="collapseTest<?= $step; ?>">
                            <?= Yii::t('app', 'mainNotes') ?>
                        </button>
                        <div class="collapse" id="collapseTest<?= $step ?>">
                            <div class="well myMainDeleteMarginBootom">
                                <?php if(!isset($config['calc']) &&!isset($config['result'])) {
                                    echo Yii::t('app', $config['note']);
                                }
                                elseif(isset($config['calc'])) {
                                    echo 'Формула расчета:&nbsp&nbsp&nbsp';
                                    ?>

                                    <img src="<?= $config['view_calc']; ?>">

                                    <?php
                                    echo '&nbsp, где <br>';
                                    $array = json_decode($model->calc_conf, true);
                                    foreach($array as $val) {

                                        ?>
                                        <img src="<?= $model->sub_model->viewVar($val) ?>">
                                        <?php
                                        echo '&nbsp;&nbsp;&mdash;&nbsp;&nbsp;' . $model->sub_model->attributeLabels()[$val] . '<br>'. '<br>';
                                    }

                                    echo 'Обращаем Ваше <b>внимание</b>, что значение определенных компонент задается администраторами сайта.';

                                    ?>
                                <?php
                                }
                                elseif(isset($config['result'])) {
                                    echo 'Формула по которой происходил расчет:&nbsp&nbsp&nbsp';
                                    ?>
                                    <img src="<?= $config['view_calc']; ?>">
                                    <?php

                                    echo '&nbsp, где <br>';
                                    $array = json_decode($model->calc_conf, true);

                                    foreach($array as $val) {
                                        ?>
                                        <img src="<?= $model->sub_model->viewVar($val) ?>">
                                        <?php
                                        echo '&nbsp;&nbsp;&mdash;&nbsp;&nbsp;' . $model->sub_model->attributeLabels()[$val] . '&nbsp;&nbsp;(Введенный параметр&nbsp;&mdash;&nbsp;<b>' . $model->sub_model->$val . '</b>)' . '<br>' . '<br>';

                                    }
                                    ?>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                            if(isset($config['calc'])) {
                            $varibles = json_decode($model->calc_conf, true);
                            foreach ($varibles as $name) {
                                $images = '<img src="' . $test->sub_model->viewVar($name) . '">';
                                $t = $test->sub_model->configVariable($name);
                                if($t) {
                                    echo "<br>";
                                    echo $form->field($test->sub_model, $name)->widget(MaskedInput::className(), $t[0])->textInput($test->sub_model->lockVariables($name))->label()->hint(Yii::t('app', $t[1]), ['style' => 'font-weight: bold; margin: 0; display: inline;', 'class' => 'mytextsize control-label myCollapseHint']);
                                }
                            }
                            ?>
                                <button id="calculation" type="button" class="btn btn-default">РАССЧИТАТЬ</button>
                        <?php } elseif(!isset($config['result'])) { ?>
                        <div class="air"></div>
                        <?php
                        for($i = 0; $i < $count; $i++)    {
                            ?>
                            <div class="col-sm-<?= $size ?> heightMin">
                                <div id="<?=  $step . $i ?>"  class="vertical-timeline-icon navy-bg myIcon <?= $state? "activeIcon":"" ?>" data-id="<?= $i ?>">
                                    <?php if( !in_array($config[$i]['image'], ['Yes', 'Not']) ) { ?>
                                         <img src="<?= $config[$i]['image']?>" width="45" height="45" class="myImage">
                                     <?php } else {?>
                                           <p class="myYesNot"><?= Yii::t('app',$config[$i]['image']) ?></p>
                                     <?php } ?>

                                </div>
                                <div class="myLabel text-center">
                                    <p class="mytextsize"><?=  in_array(Yii::t('app', $config[$i]['name']),['Да', 'Нет'])? '': Yii::t('app', $config[$i]['name']) ?></p>
                                </div>

                            </div>
                            <?php
                        }
                            }
                            else {
                                for($a = 0; $a < count($model->sub_model->result); $a++)
                                {
                                ?>
                                    <br>
                                    <br>
                                    <h1> <?= $model->sub_model->result[$a] ?></h1>
                                    <br>
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php
    ActiveForm::end();
$j = "$(document).ready(function() {
    $('[id^=\"" . $step . "\"]').on('click', function() {
        $('#calcform-value" . $step . "').val($(this).attr('data-id'));
        $('#calcform-params" . $step . "').val($('#calcform-params" . $step . "').attr('value'));
        $('#calcform-calc_conf" . $step . "').val($('#calcform-calc_conf" . $step . "').attr('value'));
        $('#calcform" . $step . "').submit();               
    });
    
";
if(isset($config['calc'])) {
    $j.=" $('#calculation').on('click', function() {
        $('#calcform-value" . $step . "').val(0);
        $('#calcform-params" . $step . "').val($('#calcform-params" . $step . "').attr('value'));
        $('#calcform-calc_conf" . $step . "').val($('#calcform-calc_conf" . $step . "').attr('value'));
        $('#calcform" . $step . "').submit();               
        });
        ";
}
$this->registerJs($j . '})');
?>
