<?php

/** @var $this \yii\web\View */
/* @var $model \app\models\forms\CalcForm*/
use app\widgets\Form;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$count = 0;

array_walk($config, function($value, $key) use (&$count)
{
    if(in_array($key, [1,2,3,4,5,6,7,8,9]))
        $count++;
});
$count++;

$size = intdiv(12, $count);
$state = (isset($config['event']))? true: false;

$test = clone $model;

$test->params = json_encode([$step => $config]);

    if($state == true && $config['step'] > 1) {

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
        if ($config['step'] == 2) {
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
    $form = ActiveForm::begin(['id' => 'calcform' . $config['step'],
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


<!--  Составной блок нашего аккардиона -->
<div class="vertical-timeline-block">

    <!--      Иконка-цифра, которая на отображает текущий шаг к подсчету формулы  -->
    <div class="vertical-timeline-icon navy-bg">
        <i class="fa"><?= $config['step']?></i>
    </div>

<!--    <div class="col-sm-9">-->
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

                        <a  class="myclick mytextsize" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $config['step']; ?>">
                            <?= Yii::t('app', $config['label']) ?>  <span style="font-weight: bolder;"><?= (!$state)? ' &mdash; ' . Yii::t('app',$config['choosename']) : '' ;?></span>
                        </a>

                    </h5>

                </div>
                <div id="collapse<?= $config['step']; ?>" class="panel-collapse collapse <?= $state? 'in': '' ?>">
                    <div class="panel-body" style="min-height: 100px;">

                        <?php
                            if($state == true && $config['step']!= 1) {
                        ?>

                        <button id="backStep" type="button" class="btn btn-light myStepDown"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Назад</button>

                        <?php } ?>
                        <button class="btn btn-light myMainNote" type="button" data-toggle="collapse" data-target="#collapseTest<?= $config['step']; ?>" aria-expanded="false" aria-controls="collapseTest<?= $config['step']; ?>">
                            <?= Yii::t('app', 'mainNotes') ?>
                        </button>
                        <div class="collapse" id="collapseTest<?= $config['step'] ?>">
                            <div class="well myMainDeleteMarginBootom">
                                <?php
                                    echo Yii::t('app', $config['note']);
                                ?>
                            </div>
                        </div>

                        <div class="air"></div>

                         <div class="hide"><?= $form->field( $test, 'value', [
                                 'inputOptions' => [
                                     'id' => 'calcform-value' . $config['step'],
                                 ],
                             ] )->hiddenInput()->label(false); ?>
                         </div>

                         <div class="hide"><?= $form->field( $test, 'params', [
                                 'inputOptions' => [
                                     'id' => 'calcform-params' . $config['step'],
                                 ],
                             ] )->hiddenInput()->label(false); ?>
                         </div>

                        <?php
                        for($i = 0; $i < $count; $i++)    {
                            ?>
                            <div class="col-sm-<?= $size ?> heightMin">
                                <div id="<?=  $config['step'] . $i ?>"  class="vertical-timeline-icon navy-bg myIcon <?= $state? "activeIcon":"" ?>" data-id="<?= $i ?>">
                                    <?php if( !in_array($config[$i]['image'], ['Yes', 'Not']) ) { ?>
                                         <img src="<?= $config[$i]['image']?>" width="45" height="45" class="myImage">
                                     <?php } else {?>
                                           <p class="myYesNot"><?= Yii::t('app',$config[$i]['image']) ?></p>
                                     <?php } ?>

                                </div>
                                <div class="myLabel text-center">
                                    <p class="mytextsize"><?=  Yii::t('app', $config['names'][$i]) ?></p>
                                </div>

                            </div>
                            <?php
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
    $('[id^=\"" . $config['step'] . "\"]').on('click', function() {
        $('#calcform-value" . $config['step'] . "').    val($(this).attr('data-id'));
        $('#calcform-params" . $config['step'] . "').val($('#calcform-params" . $config['step'] . "').attr('value'));
        $('#calcform" . $config['step'] . "').submit();               
    });     
})";
$this->registerJs($j);

$test = "$(document).ready(function() {
        $('[id^=\"" . $config['step'] . "\"]').on('click', function() {
            $('#calcform-value" . $config['step'] . "').val($(this).attr('data-id'));
            $('#calcform-params" . $config['step'] . "').val($('#calcform-params" . $config['step'] . "').attr('value'));
            $('#calcform" . $config['step'] . "').submit();               
        });     
    })";
?>
