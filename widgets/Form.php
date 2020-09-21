<?php


namespace app\widgets;


use yii\base\Widget;

class Form extends Widget
{
    public $config;
    public $model;
    public $array;
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

        return $this->render('form', ['config' => $this->config, 'model' => $this->model, 'array' => $this->array, 'parametrs' => $this->parametrs]);
    }
}