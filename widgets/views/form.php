<?php

/** @var $this \yii\web\View */
/* @var $model \app\models\forms\CalcForm*/
use app\widgets\Form;
use yii\bootstrap\ActiveForm;


// Количество выбираемых элементов в блоке
$size = intdiv(12, $config['count']);
$state = (isset($config['event']))? true: false;

if($state == true) {
    $form = ActiveForm::begin(['id' => 'calcform',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'offset' => '',
                'wrapper' => 'col-sm-4',
                'error' => '',
                'hint' => 'col-sm-2',
            ],
        ],
        'options' => ['data-pjax' => 1]]);
}

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

                        <a class="myclick" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $config['step']; ?>">
                            <?= Yii::t('app', $config['label']) ?> <?= (!$state)? ' &mdash; ' . Yii::t('app',$config['choosename']) : '' ;?>
                        </a>

                    </h5>

                </div>
                <div id="collapse<?= $config['step']; ?>" class="panel-collapse collapse <?= $state? 'in': '' ?>">
                    <div class="panel-body" style="min-height: 100px;">

                        <?php
                        if($model->result == null) {
                        ?>

                        <?php if(!is_integer($config['calc'])){ ?>
                        <div class="air"></div>
                        <?php } ?>

                        <?php if($state == true) { ?>
                            <div class="hide"><?= $form->field( $model, 'value' )->hiddenInput()->label(false); ?></div>

                        <?php } ?>

                        <?php

                        if( isset($model->calc_conf) && isset($config['calc']) ) {
                            $array = json_decode($model->calc_conf, true);
                            foreach ($array as $name) {
                                echo $form->field( $model, $name )->input('text', [['maxlength'=>10]])->label();
                                echo "<br>";
//                                echo "<br>";
                            }
                        }

                        ?>

                        <?php if($state == true) { ?>
                            <div class="hide"><?= $form->field( $model, 'params' )->hiddenInput()->label(false); ?></div>
                        <?php } ?>

                        <?php if($state == true) { ?>
                            <div class="hide"><?= $form->field( $model, 'calc_conf' )->hiddenInput()->label(false); ?></div>
                        <?php } ?>

                        <?php
                        for($i = 0; $i < $config['count']; $i++) {
                            ?>
                            <div class="col-sm-<?= $size ?> heightMin">
                                <div class="vertical-timeline-icon navy-bg myIcon <?= $state? "activeIcon":"" ?>" data-id="<?= $i ?>">
                                    <i class="fa <?= $config[$i]['image'] ?> fa-2x" aria-hidden="true"></i>
                                </div>
                                <div class="myLabel text-center">
                                    <p><?=  Yii::t('app', $config['names'][$i]) ?></p>
                                </div>

                            </div>
                            <?php
                        }
                        ?>

                        <?php }
                            else {
                            ?>


                                <h1> <?= $model->result; ?> </h1>



                        <?php } ?>









                    </div>
                </div>
            </div>
        </div>
</div>



<?php






if($state == true) {

    $j = "$(document).ready(function() {
    $('.activeIcon').on('click', function() {
        
        $('#calcform-value').val($(this).attr('data-id'));
        $('#calcform-params').val($('#calcform-params').attr('value'));
        $('#calcform-calc_conf').val($('#calcform-calc_conf').attr('value'));
        
        
        
        $('#calcform').submit();               
    });     
})";
    $this->registerJs($j);
    ActiveForm::end();
}



//var_dump($config);
//echo '<br>' . $config['step'];

?>
