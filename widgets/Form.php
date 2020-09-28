<?php


namespace app\widgets;


use yii\base\Widget;

class Form extends Widget
{
    public $step;
    public $config;
    public $model;
    public $parametrs;

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        parent::run();
        $output = ob_get_clean();

        return $this->render('form', ['step' => $this->step, 'config' => $this->config, 'model' => $this->model, 'parametrs' => $this->parametrs]);
    }
}