<?php
use app\widgets\Form;
use yii\widgets\Pjax;
use \yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\forms\CalcForm */

?>
<!--<div class="col-md-9 mycontent">-->
<div class="panel-group" id="accordion">

    <div id="vertical-timeline" class="vertical-container dark-timeline mycontent">
        <?php
        $array = json_decode($model->params, true);
        $o = [];
        foreach($array as $json) {
            $o[] = $json;

            Form::begin(['config' => $json, 'model' => $model, 'array' => $o]);
            Form::end();
        }
        ?>
    </div>
</div>
<!--</div>-->
<!--<div class="col-md-3 mynote" style="position: fixed; left: 75%; top: 12.0%;">-->
<!--    <div class="col-md-8 notes" >-->
<!--        <h4 style="position: absolute; top: 15%;  line-height: 30px;">--><?//=(Yii::t('app', $json['note'])) ?><!--</h4>-->
<!--    </div>-->
<!--    <div class="col-md-4">-->
<!--    </div>-->
<!---->
<!--</div>-->


<?php


$js = " $(document).ready(function() {
$('.myclick').on('click', function() {

    var o = $(this).closest('.panel-default').find('.panel-collapse.collapse');
    
    $('[class*=\"panel-collapse collapse in\"]').each(function( index ){
        if ( $(this).attr('id') != $(o).attr('id') ) {
            var b = $(this).parent().find('a.myclick');
            $(b).removeClass('myclick').click();
            setTimeout(function(){
                $(b).addClass('myclick');
            }, 250 );
       }
    });
    
});
});";
$this->registerJs($js);







//$("#box").animate({height: "0px"});
//        $(this).removeClass('in');
?>










