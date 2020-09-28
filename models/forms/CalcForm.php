<?php

namespace app\models\forms;


use yii\base\Model;

/**
 * CalcForm is the model behind the contact form.
 */
class CalcForm extends Model
{
    //при клике именно это значение мы отправляем в контролллер для определения дальнейшего шага
    public $value;

    //центральный массив JSON-ов определящий отображение на главной страницы
    public $params;

    //индикатор на то, что мы воспользовались шагом назад
    public $back_step;

    //модель для расчета формулы
    public $sub_model;

    public function rules()
    {
        return [
            [['value', 'params', 'back_step', 'sub_model'], 'safe'],
        ];
   }

    public function fixJson($value) {
        if(is_null($this->params) || ($value == 111)) {
            $this->params = null;
            $content = file_get_contents('js/mainconf.json');
            $content = utf8_encode($content);
            $this->params[0] = json_decode($content, true);
            $this->params[0]['event'] = true;
            return $this->params[0];
        }

        unset($this->params[array_key_last($this->params)]['event']);
        if($this->back_step == 1) {
            $array = end($this->params);
            $this->params[] = $array[$value];
            $this->params[array_key_last($this->params)]['event'] = true;
            $this->back_step = 0;
            return end($this->params);
        }
        $this->params[array_key_last($this->params)]['choosename'] = $this->params[array_key_last($this->params)][$value]['name'];
        $array = end($this->params);
        $this->params[] = $array[$value];
        $this->params[array_key_last($this->params)]['event'] = true;

        return end($this->params);

    }

}
