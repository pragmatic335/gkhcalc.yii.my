<?php

namespace app\models\forms;


use yii\base\Model;

/**
 * CalcForm is the model behind the contact form.
 */
class CalcForm extends Model
{


    /*Глобальные определяющие параметры*/

        //при клике именно это значение мы отправляем в контролллер для определения дальнейшего шага
        public $value;

        //центральный массив JSON-ов определящий отображение на главной страницы
        public $params;

        //результат вычисления по формуле
        public $result;

        //массив с содержащий наименования переменных для расчета конкретной формулы
        public $calc_conf;

    /* ------------------------------- */







    /*переменные необходимые для расчета формулы по услуге ХВС*/

        /*для ОДН по ХВС при наличии ОДПУ */
        public $size_odpu; //объем потребления на общедомовом приборе учета
        public $size_ipu_all; //объем потребления по всем жилым помещениям, оборудованных индивидуальными приборами учета
        public $size_not_ipu_all; //объем потребления по всем жилым помещениям, не оборудованными ИПУ
        public $size_notliv_all; //объем потребления по всем нежилым помещениям
        public $size2service_hvs; // Объем холодной воды, использованный при производстве коммунальной услуги по отоплению и (или) горячему водоснабжению (при отсутствии на доме централизованнной сиситемы теплоснабжения) (м3)
        /* ------------------------------ */


        //количество электроэнергии затраченной на прочие услуги
        public $size2service_energy;

        /* общие поля для ОДН ХВС */
        public $tariff; // Тариф
        public $space_owner; // Площадь вашей квартиры
        public $space_full_all; // Общая площадь всем помещений в МКД
        /* ---------------------- */


        /*для ОДН по ХВС при отсутсвии ОДПУ*/
        public $norm2odn; // Норматив на холодное водоснабжение, предоставленного на общедомовые нужды
        public $space_oi_all; // Общая площадь помещений, входящих в состав общего имущества
        /* ------------------------------ */


        /* для ИПУ есть */
        public $size_ipu;
        /* ------------ */

        /*если нет ИПУ и нет возможности его установки*/
        public $norm;
        public $kol;
        /* --------------- */

        /* повышающий коэффициент для ХВС*/
         const MULTIPLIER = 1.5;

     /* ---------------------------------------------- */






    /*переменные необходимые для расчета формулы по услуге ГВС*/

    //для одноком ОДПУ ГВС установлен
    public $size2service_gvs;


    /* Двухкомпонентный тариф ОДПУ есть*/
        // $size_odpu   объем горячего водоснабжения, потребленного по показаниям общедомового прибора учета
        // $size_ipu_all  объем потребления по всем жилым помещениям, оборудованных индивидуальными приборами учета
        // $size_not_ipu_all  объем потребления по всем жилым помещениям, не оборудованными ИПУ
        // $size_notliv_all  объем потребления по всем нежилым помещениям
        // $size2service_gvs
        //
        public $space_full_all_liv; // Общая площадь всем помещений в МКД
        // $space_owner  Площадь вашей квартиры
        // $tariff Тариф
        public $norm2heating; // норматив на подогрев
        public $tariff2heating_energy; // тариф на тепловую энергию
    /* ------------------------------- */

    /* Двухкомпонентный тариф ОДПУ нет*/
        public $norm_gvs;
        // $space_oi_all; // Общая площадь помещений, входящих в состав общего имущества
        // public $space_full_all_liv; // Общая площадь всем помещений в МКД
        // $space_owner  Площадь вашей квартиры
        // $tariff Тариф
        // public $norm2heating; // норматив на подогрев
        // public $tariff2heating_energy; // тариф на тепловую энергию
    /* ------------------------------- */

    //ИПУ ДВУХКОМ есть
    //size_ipu
    // $tariff Тариф
    // public $norm2heating;
    // public $tariff2heating_energy;


    //ИПУ ДВУХКОМ нет и нет возможности его установки
    //$kol;
    //$norm;
    // $tariff Тариф
    // public $norm2heating;
    // public $tariff2heating_energy;











    /* ------------------------------------------------------- */















    public function attributeLabels()
    {
        return [
            'tariff' => 'Тариф',
            'space_owner' => 'Площадь вашей квартиры',
            'space_full_all' => 'Общая площадь всех помещений в МКД',
            'size_odpu' => 'Объем потребления на общедомовом приборе учета',
            'size_ipu_all' => 'Объем потребления по всем жилым помещениям, оборудованных индивидуальными приборами учета',
            'size_notliv_all' => 'Объем потребления по всем нежилым помещениям',
            'size2service_hvs' => 'Объем холодной воды, использованный при производстве коммунальной услуги по отоплению и (или) горячему водоснабжению',
            'size_not_ipu_all' => 'Объем потребления по всем жилым помещениям, не оборудованными ИПУ',
            'norm2odn' => 'Норматив на услугу, предоставленную на общедомовые нужды, установленный для Вашего региона (м3):',
            'space_oi_all' => 'Общая площадь помещений, входящих в состав общего имущества собственников помещений МКД (м2):',
            'size_ipu' => 'Объем услуги, потребленной по Вашему индивидуальному прибору учета в кубических метрах (м3)',
            'norm' => 'Норматив, установленный на услугу для Вашего региона (м3)',
            'kol' => 'Количество постоянно и временно проживающих в квартире граждан (чел.):',
            'size2service_gvs' => 'Объем электрической энергии или газа, использованный за расчетный период исполнителем при производстве коммунальной услуги по отоплению и (или) горячему водоснабжению',
            'norm2heating' => 'Норматив на подогрев',
            'tariff2heating_energy' => 'Тариф на тепловую энергию',
            'space_full_all_liv' => 'Площадь всех жилых помещений',
            'norm_gvs' => 'Норматив потребления на горячее водоснабжение',
            'size2service_energy' => ' Объем электрической энергии, использованный при производстве коммунальной услуги по отоплению и (или) горячему водоснабжению (кВт)',
        ];
    }




    public function rules()
    {
        return [
            [['space_full_all', 'size_odpu', 'size_ipu_all', 'size_notliv_all',
                'size_not_ipu_all', 'size2service_hvs', 'space_oi_all', 'size_ipu', 'kol',
                'size2service_gvs', 'space_full_all_liv', 'size2service_energy'], 'double', 'message' => 'Введите правильное числовое значение. Будьте внимательны, дробную часть отделяйте от целой точкой, а не запятой! '],
//            [['space_full_all', 'size_odpu', 'size_ipu_all', 'size_notliv_all',
//                'size_not_ipu_all', 'size2service_hvs', 'space_oi_all', 'size_ipu', 'kol',
//                'size2service_gvs', 'space_full_all_liv', 'size2service_energy'], 'required', 'message' => 'Поле не должно быть пустым'],
            [['tariff', 'norm2odn', 'norm', 'norm2heating', 'tariff2heating_energy', 'norm_gvs'], 'double', 'message' => 'Введите правильное числовое значение. Будьте внимательны, дробную часть отделяйте от целой точкой «.», а не запятой! '],
//            [['tariff', 'norm2odn', 'norm', 'norm2heating', 'tariff2heating_energy', 'norm_gvs'], 'required', 'message' => 'Необходимо ввести данные'],
            [['value', 'params', 'calc_conf', 'space_owner'], 'safe'],
            ['params', 'decodeParams'],
            ['space_owner', 'filter', 'filter' => [$this, 'test']],

        ];
    }

    //В params заносим json с параметрами следующего шага



    //когда вызываешь в контроллере $model->validate() у тебя срабатывает этот валидатор для того, чтобы в модельку упал не JSON, а сразу же массив(очень удобно)
    public function decodeParams($attribute, $params) {
        $this->$attribute = json_decode( $this->$attribute, true);

    }



    public function test($space_owner) {

        return $space_owner;
    }


    //Функция говорит, а что за единица измерения используется для нашей переменной в формуле расчета.
    // В добавок возвращает конфигурационный массив для виджета MaskedInput, опять же, для переменной.
    public function configVariable($variable)
    {
        $space = [
                    ['space_full_all', 'space_owner'],
                    [
                        'clientOptions' => [
                            'alias' => 'decimal',
                            'digits' => 2,
                            'digitsOptional' => true,
                            'radixPoint' => ',',
                            'groupSeparator' => ' ',
                            'autoGroup' => true,
                            'removeMaskOnSubmit' => true,
                        ]
                    ],
                    'meter^2'
            ];

        $money = [
                    ['tariff', 'tariff2heating_energy'],
                    [
                        'clientOptions' => [
                            'alias' => 'decimal',
                            'digits' => 2,
                            'digitsOptional' => true,
                            'radixPoint' => ',',
                            'groupSeparator' => ' ',
                            'autoGroup' => true,
                            'removeMaskOnSubmit' => true,
                        ]
                    ],
                    'rub'
            ];

        return (in_array($variable, $space[0]))? [$space[1], $space[2]] : ( (in_array($variable, $money[0]))? [$money[1], $money[2]] : [$money[1], $money[2]] );
    }




    public function fixJson($value) {
        if(is_null($this->params)) {
            $content = file_get_contents('js/mainconf.json');
            $content = utf8_encode($content);
            $this->params[0] = json_decode($content, true);
            $this->params[0]['event'] = true;
            return $this->params[0];
        }

        unset($this->params[array_key_last($this->params)]['event']);
        $this->params[array_key_last($this->params)]['choosename'] = $this->params[array_key_last($this->params)][$value]['name'];
        $array = end($this->params);
        $this->params[] = $array[$value];
        $this->params[array_key_last($this->params)]['event'] = true;

        return end($this->params);

    }


    public function routeCalculationVaribles($number) {
        if($number == 1) {
                    $this->calc_conf = json_encode(['tariff', 'space_owner', 'space_full_all', 'size_odpu', 'size_ipu_all', 'size_not_ipu_all', 'size_notliv_all', 'size2service_hvs']);
        }

        if($number == 2) {
            $this->calc_conf = json_encode(['tariff', 'space_owner', 'space_full_all','norm2odn', 'space_oi_all']);
        }

        if($number == 3) {
            $this->calc_conf = json_encode(['tariff', 'size_ipu']);
        }

        if($number == 4) {
            $this->calc_conf = json_encode(['tariff', 'norm', 'kol']);
        }

        if($number == 5) {
            $this->calc_conf = json_encode(['tariff', 'norm', 'kol']);
        }

        if($number == 6) {
            $this->calc_conf = json_encode(['tariff', 'space_owner', 'space_full_all', 'size_odpu', 'size_ipu_all', 'size_not_ipu_all', 'size_notliv_all', 'size2service_gvs']);
        }

        if($number == 7) {
            $this->calc_conf = json_encode(['tariff', 'space_owner', 'space_full_all','norm2odn', 'space_oi_all']);
        }


        /* ГВС ДВУХ ОДПУ ЕСТЬ */
        if($number == 8) {
            $this->calc_conf = json_encode(['size_odpu', 'size_ipu_all', 'size_not_ipu_all', 'size_notliv_all', 'size2service_gvs',
                'space_full_all_liv', 'space_owner', 'tariff', 'norm2heating', 'tariff2heating_energy']);
        }

        if($number == 9) {
            $this->calc_conf = json_encode(['norm_gvs', 'space_oi_all', 'space_full_all_liv', 'space_owner', 'tariff',
                'norm2heating', 'tariff2heating_energy']);
        }

        if($number == 10) {
            $this->calc_conf = json_encode(['size_ipu', 'tariff', 'norm2heating', 'tariff2heating_energy']);
        }

        if($number == 11) {
            $this->calc_conf = json_encode(['kol', 'norm', 'tariff', 'norm2heating', 'tariff2heating_energy']);
        }

        if($number == 12) {
            $this->calc_conf = json_encode(['kol', 'norm', 'tariff', 'norm2heating', 'tariff2heating_energy']);
        }

        if($number == 13) {
            $this->calc_conf = json_encode(['tariff', 'space_owner', 'space_full_all', 'size_odpu', 'size_ipu_all', 'size_not_ipu_all', 'size_notliv_all', 'size2service_energy']);
        }


        return true;
    }


    public function routeCalc($value) {
        if($value == 1) {
            return $this->calcOne();
        }

        if($value == 2) {
            return $this->calcTwo();
        }

        if($value == 3) {
            return $this->calcThree();
        }

        if($value == 4) {
            return $this->calcFour();
        }

        if($value == 5) {
            return $this->calcFive();
        }

        if($value == 6) {
            return $this->calcFive();
        }

        if($value == 7) {
            return $this->calcFive();
        }

        if($value == 8) {
            return $this->calcEight();
        }

        if($value == 9) {
            return $this->calcNine();
        }

        if($value == 10) {
            return $this->calcTen();

        }

        if($value == 11) {
            return $this->calcEleven();

        }

        if($value == 12) {
            return $this->calcTwenty();

        }

        if($value == 13) {
            return $this->calcThirteen();
        }

        return false;
    }



    //Калькулятор расчета платы за холодное водоснабжение, предоставленного на ОДН, при наличии ОДПУ по формуле номер 1
    public function calcOne() {
        $array = json_decode($this->calc_conf, true);

         $a = $array[3];
         $b = $array[4];
         $c = $array[5];
         $d = $array[6];
         $e = $array[0];
         $f = $array[1];
         $g = $array[2];
         $r = $array[7];
        $this->result = ($this->$a - $this->$d - $this->$b - $this->$c - $this->$r) * $this->$e * ($this->$f/$this->$g);
        return true;
    }


    //ХВС ОДПУ нет
    public function calcTwo() {

        $array = json_decode($this->calc_conf, true);


        $e = $array[0];
        $f = $array[1];
        $g = $array[2];
        $a = $array[3];
        $b = $array[4];

        $this->result = ($this->$a * $this->$b * ($this->$f/$this->$g) * $this->$e);
        return true;

    }

    //ИПУ если
    public function calcThree() {
        $array = json_decode($this->calc_conf, true);
        $e = $array[0];
        $f = $array[1];

        $this->result = $this->$e * $this->$f;
        return true;


    }

    //ХВС ИПУ нет и нет возможности его установки
    public function calcFour() {
        $array = json_decode($this->calc_conf, true);
        $e = $array[0];
        $f = $array[1];
        $a = $array[2];

        $this->result = $this->$e * $this->$f * $this->$a;
        return true;
    }

    //ХВС ИПУ если его нет и есть возможность его установки
    public function calcFive() {
        $array = json_decode($this->calc_conf, true);
        $e = $array[0];
        $f = $array[1];
        $a = $array[2];

        $this->result = $this->$e * $this->$f * $this->$a * self::MULTIPLIER;
        return true;
    }

    //ГВС Однокомпонентный тариф ОДПУ, если счетчик есть
    public function calcSix() {
        $array = json_decode($this->calc_conf, true);

        $a = $array[3];
        $b = $array[4];
        $c = $array[5];
        $d = $array[6];
        $e = $array[0];
        $f = $array[1];
        $g = $array[2];
        $r = $array[7];

        $this->result = ($this->$a - $this->$d - $this->$b - $this->$c - $this->$r) * $this->$e * ($this->$f/$this->$g);
        return true;

    }

    //ГВС Однокомпонентный тариф ОДПУ, если счетчика нет
    public function calcSeven()
    {
        $array = json_decode($this->calc_conf, true);

        $e = $array[0];
        $f = $array[1];
        $g = $array[2];
        $a = $array[3];
        $b = $array[4];

        $this->result = ($this->$a * $this->$b * ($this->$f/$this->$g) * $this->$e);
        return true;

    }

    //ГВС Двухкомпонентный тарий ОДПУ, если счетчик есть
    public function calcEight()
    {
        $array = json_decode($this->calc_conf, true);
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];
        $f = $array[5];
        $g = $array[6];
        $h = $array[7];
        $i = $array[8];
        $k = $array[9];

        $tmp = ($this->$a - $this->$b - $this->$c - $this->$d - $this->$e) * ($this->$g/$this->$f);

        $this->result = ($tmp * $this->$h) + (($tmp * $this->$i) * $this->$k);
        return true;
    }


    public function calcNine()
    {
        $array = json_decode($this->calc_conf, true);
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];
        $f = $array[5];
        $g = $array[6];

        $tmp = $this->$a * $this->$b * ($this->$d/$this->$c);
        $this->result = ($tmp) * $this->$e + ($tmp*$this->$f)*$this->$g;
        return true;
    }

    //горячая вода двухкомпонентный тариф ИПУ  есть
    public function calcTen()
    {
        $array = json_decode($this->calc_conf, true);
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $this->result = round( ($this->$a * $this->$b) + (($this->$a * $this->$c) * $this->$d), 2);
        return true;
    }

    //горячая вода двухкомпонентный тариф ИПУ нет возможности установки нет
    public function calcEleven()
    {
        $array = json_decode($this->calc_conf, true);
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];
        $tmp = $this->$a * $this->$b;

        $this->result = round( ($tmp * $this->$c) + (($tmp * $this->$d) * $this->$e), 2);
        return true;
    }

    //горячая вода двухкомпонентный тариф ИПУ нет возможности установки есть
    public function calcTwenty()
    {
        $array = json_decode($this->calc_conf, true);
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];
        $tmp = $this->$a * $this->$b;

        $this->result = round( (self::MULTIPLIER * $tmp * $this->$c) + (($tmp * $this->$d) * $this->$e), 2);
        return true;
    }


    //ОДПУ отопление
    public function calcThirteen() {
        $array = json_decode($this->calc_conf, true);

        $a = $array[3];
        $b = $array[4];
        $c = $array[5];
        $d = $array[6];
        $e = $array[0];
        $f = $array[1];
        $g = $array[2];
        $r = $array[7];

        $this->result = ($this->$a - $this->$d - $this->$b - $this->$c - $this->$r) * $this->$e * ($this->$f/$this->$g);
        return true;

    }






    }
