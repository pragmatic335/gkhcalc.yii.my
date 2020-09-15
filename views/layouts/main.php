<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

use app\assets\AppAsset;

AppAsset::register($this);
$this->registerJs('
    jQuery(document).on("pjax:success", "#calcform",  function(event){
            $.pjax.reload({container:"#accordion",timeout:200})
          }
        );
   ');
//$js = <<<JS
//    $('#but').on('click', function(){
//        $.ajax({
//        url:'/ajax/test',
//        data: {test: 'da'},
//        type: 'POST'
//        }).done(function(data) {
//            if(data != null) {
//                $('#res').html(data)
//            }
//            else {
//                $('#res').html(data)
//            }
//        });
//    });
//JS;
//
//$this->registerJs($js);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<!--    <div class="container">-->

    <div class="header">
        <h1 style="text-align: center;">Он-лайн калькулятор для расчета коммунальных услуг</h1>
        <h3 style="text-align: center;">порядок начислений и размер платы</h3>
    </div>


    <div class="col-md-2">

    </div>

    <div class="col-md-8">
        <?= $content ?>
    </div>

    <div class="col-md-2">

    </div>


<!--    </div>-->

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
