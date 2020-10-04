<?php


namespace app\models\forms;


use yii\base\Model;

class SubForm extends Model
{

    public $result = []; //результат вычисления по формуле
    public $calc_conf; //массив с содержащий наименования переменных для расчета конкретной формулы

    public $space_owner; // Площадь вашей квартиры
    public $gvs_multiplier_heating; //коэффициент на подогрев
    public $tariff_gvs_heating = '1467,82';
    public $tariff_gvs_teplonos = '19,46';

    public $pays_pre_year;
    public $size_odpu_corrects_oneyear;
    public $size_odpu_corrects_twoyear;
    public $space_all;
    //space_owner;
    public $tariff_corrects_oneyear = '1384,74';
    public $tariff_corrects_twoyear = '1384,74';

    //space_owner
    public $norm_heating_house;
    public $multiplier_house = '0,75';
    public $tariff_heating_house = '1467,82';

    //отопление нет одпу
    //space_owner
    public $norm_heating_mkd_odpu_not;
    //space_all
    public $space_soi;
    public $space_heating_mkd_odpu_not_ipu_not;
    //multiplier_house
    public $tariff_heating_mkd_odpu_not = '1467,82';


    /**
     * Переменные для расчета отопления, где присутствует ОДПУ и полностью присутствуют ИПУ
     * формула 12
     */
    //space_owner
    public $size_heating_odpu_average_last_year;
    public $size_heating_ipu_average_last_year;
    public $size_heating_ipu_all_average_last_year;
    //space_all
    public $size_heating_all_average_last_year;
    public $space_heating_where_exists_ipu;
    //tariff_heating_house


    /**
     * Переменные для расчета отопления, где присутствует ОДПУ, но полностью отсутствуют ИПУ
     * формула 13
     */
    //space_owner
    //size_heating_odpu_average_last_year
    //size_heating_ipu_average_last_year
    //space_all
    //space_soi
    //space_heating_mkd_odpu_not_ipu_not
    //tariff_heating_mkd_odpu_not = '1467,82'


    /**
     * Переменные для расчета отопления, где присутствует ОДПУ, но полностью отсутствуют ИПУ
     * формула 14
     */
    //space_owner
    //size_heating_odpu_average_last_year
    //size_heating_ipu_average_last_year
    //space_all
    //size_heating_all_average_last_year
    //space_heating_where_exists_ipu
    //tariff_heating_mkd_odpu_not = '1467,82'


    /**
     * Переменные для расчета TKO
     * формула 1
     */
    //public $kol;
    public $norm_tko = '2,38';
    public $tariff_tko = '301,92';


    /**
     * Переменные для расчета СОИ ХВС, ГВС, ЭЭ, Водоотведения
     * формула 1
     */
    //space_owner
    //space_soi
    //space_all
    public $norm_soi_hvs = '0,021';
    public $norm_soi_energy = '1,381';
    public $norm_soi_drainage = '0,044';
    public $norm_soi_gvs = '0,021';
    //tariff_hvs
    //tariff_energy
    //tariff_drainage
    //tariff_gvs


    /**
     * Переменные для расчета СОИ ХВС, ГВС, ЭЭ, Водоотведения
     * формула 1
     */
    //space_owner
    //space_soi
    //space_all
   public $multiplier_soi_gvs = '0,0662';
    //norm_soi_gvs
    //tariff_gvs_teplonos
    //tariff_heating_house












    public $space_full_all; // Общая площадь всем помещений в МКД
    public $size_odpu; //объем потребления на общедомовом приборе учета
    public $size_ipu_all; //объем потребления по всем жилым помещениям, оборудованных индивидуальными приборами учета
    public $size_not_ipu_all; //объем потребления по всем жилым помещениям, не оборудованными ИПУ
    public $size_notliv_all; //объем потребления по всем нежилым помещениям
    public $size2service_hvs; // Объем холодной воды, использованный при производстве коммунальной услуги по отоплению и (или) горячему водоснабжению (при отсутствии на доме централизованнной сиситемы теплоснабжения) (м3)

    public $size2service_energy;


    public $norm2odn; // Норматив на холодное водоснабжение, предоставленного на общедомовые нужды
    public $space_oi_all; // Общая площадь помещений, входящих в состав общего имущества

    public $size_ipu_hvs_drainage;
    public $size_ipu_energy;
    public $size_ipu;

    public $tariff = '19,46'; // Тариф
    public $tariff_hvs = '19,46'; // Тариф
    public $tariff_energy = '2,8'; // Тариф
    public $tariff_drainage = '15,08'; // Тариф
    public $tariff_gvs = '114,54'; // Тариф

    public $norm_hvs = '5,193';
    public $norm_energy;
    public $norm_drainage = '8,88';
    public $norm_gvs = '3,687';
    public $norm = '5,193';


    public $kol;
    public $multiplier = '1,5';
    public $size2service_gvs;
    public $space_full_all_liv; // Общая площадь всем помещений в МКД
    public $norm2heating; // норматив на подогрев
    public $tariff2heating_energy; // тариф на тепловую энергию
    public $size_ipu_heating_one;//потребление на ИПУ жильца
    public $size_odpu_heating;//потребление на ОДПУ дома
    public $size_ipu_heating_all;//общее потребления по всем ИПУ в доме
    public $space_ipu_where;
    public $space_iio_where;


    public function rules()
    {
        return [

            [
                ['multiplier', 'space_full_all', 'space_owner' ,'size_odpu', 'size_ipu_all', 'size_notliv_all',
                    'size_not_ipu_all', 'size2service_hvs', 'space_oi_all', 'size_ipu', 'kol',
                    'size2service_gvs', 'space_full_all_liv', 'size2service_energy', 'space_owner',
                    'size_ipu_heating_one', 'size_odpu_heating', 'size_ipu_heating_all',
                    'tariff', 'norm2odn', 'norm', 'norm2heating', 'tariff2heating_energy', 'norm_gvs', 'space_ipu_where', 'space_iio_where',
                    'norm_hvs', 'norm_energy', 'norm_drainage', 'size_ipu_hvs_drainage', 'size_ipu_energy',
                    'tariff_hvs','tariff_energy','tariff_drainage', 'tariff_gvs', 'gvs_multiplier_heating', 'tariff_gvs_heating', 'tariff_gvs_teplonos',
                    'pays_pre_year', 'size_odpu_corrects_oneyear', 'size_odpu_corrects_twoyear', 'space_all', 'tariff_corrects_oneyear',
                    'tariff_corrects_twoyear', 'norm_heating_house', 'multiplier_house', 'tariff_heating_house',
                    'norm_heating_mkd_odpu_not', 'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'tariff_heating_mkd_odpu_not',
                    'size_heating_odpu_average_last_year', 'size_heating_ipu_average_last_year', 'size_heating_ipu_all_average_last_year',
                    'size_heating_all_average_last_year', 'space_heating_where_exists_ipu',
                    'norm_tko', 'tariff_tko', 'norm_soi_hvs', 'norm_soi_energy','norm_soi_gvs','norm_soi_drainage', 'multiplier_soi_gvs'],
                'filter', 'filter' => function ($value) {
                $value =  str_replace(',', '.', $value);
                $value =  str_replace(' ', '', $value);
                if(is_null($value) || ($value == '')) {
                    $value = 'a';
                }
                return $value;}],

            [['multiplier', 'space_full_all', 'space_owner' ,'size_odpu', 'size_ipu_all', 'size_notliv_all',
                'size_not_ipu_all', 'size2service_hvs', 'space_oi_all', 'size_ipu', 'kol',
                'size2service_gvs', 'space_full_all_liv', 'size2service_energy', 'space_owner',
                'tariff', 'norm2odn', 'norm', 'norm2heating', 'tariff2heating_energy', 'norm_gvs',
                'size_ipu_heating_one', 'size_odpu_heating', 'size_ipu_heating_all',
                'tariff', 'norm2odn', 'norm', 'norm2heating', 'tariff2heating_energy', 'norm_gvs',
                'space_ipu_where', 'space_iio_where', 'norm_hvs', 'norm_energy', 'norm_drainage',
                'size_ipu_hvs_drainage', 'size_ipu_energy', 'tariff_hvs','tariff_energy','tariff_drainage',
                'gvs_multiplier_heating', 'tariff_gvs_heating',
                'tariff_gvs', 'tariff_gvs_teplonos','pays_pre_year', 'size_odpu_corrects_oneyear', 'size_odpu_corrects_twoyear', 'space_all', 'tariff_corrects_oneyear',
                'tariff_corrects_twoyear', 'norm_heating_house', 'multiplier_house', 'tariff_heating_house',
                'norm_heating_mkd_odpu_not', 'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'tariff_heating_mkd_odpu_not',
                'size_heating_odpu_average_last_year', 'size_heating_ipu_average_last_year', 'size_heating_ipu_all_average_last_year',
                'size_heating_all_average_last_year', 'space_heating_where_exists_ipu',
                'norm_tko', 'tariff_tko','norm_soi_hvs', 'norm_soi_energy','norm_soi_gvs','norm_soi_drainage', 'multiplier_soi_gvs'], 'required', 'message' => 'Поле не должно быть пустым. Также будьте внимательны при вводе числовых параметров!'],



            [['multiplier', 'space_full_all', 'space_owner' ,'size_odpu', 'size_ipu_all', 'size_notliv_all',
                'size_not_ipu_all', 'size2service_hvs', 'space_oi_all', 'size_ipu', 'kol',
                'size2service_gvs', 'space_full_all_liv', 'size2service_energy', 'space_owner',
                'size_ipu_heating_one', 'size_odpu_heating', 'size_ipu_heating_all',
                'tariff', 'norm2odn', 'norm', 'norm2heating', 'tariff2heating_energy', 'norm_gvs', 'space_ipu_where', 'space_iio_where',
                'norm_hvs', 'norm_energy', 'norm_drainage','size_ipu_hvs_drainage', 'size_ipu_energy', 'tariff_gvs',
                'tariff_hvs','tariff_energy','tariff_drainage','gvs_multiplier_heating', 'tariff_gvs_heating', 'tariff_gvs_teplonos',
                'pays_pre_year', 'size_odpu_corrects_oneyear', 'size_odpu_corrects_twoyear', 'space_all', 'tariff_corrects_oneyear',
                'tariff_corrects_twoyear', 'norm_heating_house', 'multiplier_house', 'tariff_heating_house',
                'norm_heating_mkd_odpu_not', 'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'tariff_heating_mkd_odpu_not',
                'size_heating_odpu_average_last_year', 'size_heating_ipu_average_last_year', 'size_heating_ipu_all_average_last_year',
                'size_heating_all_average_last_year', 'space_heating_where_exists_ipu',
                'norm_tko', 'tariff_tko','norm_soi_hvs', 'norm_soi_energy','norm_soi_gvs','norm_soi_drainage', 'multiplier_soi_gvs'],
                'string', 'message' => 'Введите правильное числовое значение. Будьте внимательны, дробную часть отделяйте от целой точкой, а не запятой! '],





            [['result', 'calc_conf'], 'safe'],
        ];
    }

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
            'norm2odn' => 'Норматив на услугу, предоставленную на общедомовые нужды, установленный для Вашего региона (м³):',
            'space_oi_all' => 'Общая площадь помещений, входящих в состав общего имущества собственников помещений МКД (м²):',
            'size_ipu' => 'Объем услуги, потребленной по Вашему индивидуальному прибору учета в кубических метрах (м³)',
            'norm' => 'Норматив, установленный на услугу для Вашего региона',
            'kol' => 'Количество постоянно и временно проживающих в квартире граждан:',
            'size2service_gvs' => 'Объем электрической энергии или газа, использованный за расчетный период исполнителем при производстве коммунальной услуги по отоплению и (или) горячему водоснабжению',
            'norm2heating' => 'Норматив на подогрев',
            'tariff2heating_energy' => 'Тариф на тепловую энергию',
            'space_full_all_liv' => 'Площадь всех жилых помещений',
            'space_ipu_where' => 'Площадь всех помещений, где установлен индивидуальный прибор учета',

            'size2service_energy' => ' Объем электрической энергии, использованный при производстве коммунальной услуги по отоплению и (или) горячему водоснабжению (кВт)',
            'size_ipu_heating_one' => 'Объем (количество) тепловой энергии, потребленной в вашей квартире',
            'size_odpu_heating' => 'Объем тепловой энергии по показаниям общедомового прибора учета',
            'size_ipu_heating_all' => 'Cумма объемов по всем показаниям индивидуальных приборов учета в МКД',
            'space_iio_where' => 'Общая площадь жилых помещений (квартир) и нежилых помещений, имеющих индивидуальные источники тепловой энергии',
            'multiplier' => 'Повышающий коэффициент установленный на услугу в Вашем регионе',

            'norm_hvs' => 'Норматив, установленный на услугу холодного водоснабжения для Вашего региона',
            'norm_energy' => 'Норматив, установленный на услугу электроэнергии для Вашего региона',
            'norm_drainage' => 'Норматив, установленный на услугу водоотведения для Вашего региона',
            'norm_gvs' => 'Норматив, установленный на услугу горячего водоснабжения для Вашего региона',

            'size_ipu_energy' => 'Объем услуги, потребленной по Вашему индивидуальному прибору учета',
            'size_ipu_hvs_drainage' => 'Объем услуги, потребленной по Вашему индивидуальному прибору учета',

            'tariff_hvs' => 'Тариф',
            'tariff_energy' => 'Тариф',
            'tariff_drainage' => 'Тариф',
            'tariff_gvs' => 'Тариф',
            'gvs_multiplier_heating' => 'Коэффициент подогрева',
            'tariff_gvs_heating' => 'Тариф на тепловую энергию',
            'tariff_gvs_teplonos' => 'Тариф на теплоноситель',

            'pays_pre_year' => 'Введите размер платы за отопление за предыдущий год, начисленный с января по декабрь по платежным документам',
            'size_odpu_corrects_oneyear' => 'Введите объем фактического потребления тепловой энергии по ОДПУ за первое полугодие предыдущего года',
            'size_odpu_corrects_twoyear' => 'Введите объем фактического потребления тепловой энергии по ОДПУ за второе полугодие предыдущего года',
            'space_all' => 'Введите площадь жилых и нежилых помещений в МКД',
            'tariff_corrects_oneyear' => 'Размер тарифа, первое полугодие предыдущего года',
            'tariff_corrects_twoyear' => 'Размер тарифа, первое полугодие предыдущего года',

            'norm_heating_house' => 'Норматив потребления',
            'multiplier_house' => 'Коэффициент периодичности',
            'tariff_heating_house' => 'Тариф на тепловую энергию',

            'norm_heating_mkd_odpu_not' => 'Норматив потребления',
            'space_soi' => 'Площадь общего имущества',
            'space_heating_mkd_odpu_not_ipu_not' => 'Общую площадь помещений, в которых не предусмотрено наличие приборов отопления',
            'tariff_heating_mkd_odpu_not' => 'Тариф',
            'size_heating_odpu_average_last_year' => 'Среднемесячное потребление по ОДПУ за предыдущий год',
            'size_heating_ipu_average_last_year' => 'Среднемесячное потребление по ИПУ в Вашей квартире за предыдущий год',
            'size_heating_ipu_all_average_last_year' => 'Среднемесячное потребление по ИПУ в МКД за предыдущий год',
            'size_heating_all_average_last_year' => 'Сумма объемов тепловой энергии по всем приборам учета за предыдущий год',
            'space_heating_where_exists_ipu' => 'Сумма площадей всех помещений в МКД, оборудованных индивидуальными приборама учета',
            'norm_tko' => 'Норматив',
            'tariff_tko' => 'Тариф',
            'norm_soi_hvs' => 'Норматив',
            'norm_soi_energy' => 'Норматив',
            'norm_soi_gvs' => 'Норматив',
            'norm_soi_drainage' => 'Норматив',
            'multiplier_soi_gvs' => 'Коэффициент подогрева'
        ];
    }

    public function lockVariables($name) {

        return in_array($name, ['multiplier', 'norm', 'norm_gvs', 'norm_drainage', 'norm_hvs', 'tariff_gvs', 'tariff_energy', 'tariff_hvs', 'tariff',
            'multiplier', 'tariff_heating_mkd_odpu_not', 'tariff_heating_house', 'multiplier_house', 'tariff_corrects_twoyear',
            'tariff_corrects_oneyear', 'tariff_gvs_teplonos', 'tariff_gvs_heating',
            'norm_tko', 'tariff_tko','norm_soi_hvs', 'norm_soi_energy','norm_soi_gvs','norm_soi_drainage','multiplier_soi_gvs'])?['disabled'=>true]:['disabled' => false];
    }

    public function configVariable($variable)
    {
        $array =
            [
                [
                    ['space_full_all', 'space_owner', 'space_oi_all', 'space_full_all_liv', 'space_ipu_where', 'space_iio_where', 'space_all',
                        'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'space_heating_where_exists_ipu'],
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
                ],

                [
                    ['multiplier', 'multiplier_house'],
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
                    ''
                ],

                [
                    ['tariff', 'tariff_hvs', 'tariff_energy', 'tariff_drainage', 'tariff_gvs', 'tariff2heating_energy', 'tariff_gvs_heating', 'tariff_gvs_teplonos',
                        'pays_pre_year','tariff_corrects_oneyear','tariff_corrects_twoyear',
                        'tariff_heating_house', 'tariff_heating_mkd_odpu_not', 'tariff_tko',],
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
                ],

                [
                    ['size_odpu', 'size_ipu_all', 'size_notliv_all', 'norm2odn', 'size_ipu', 'norm',
                        'size2service_hvs', 'size_not_ipu_all', 'size_ipu_hvs_drainage', 'norm_hvs',
                        'norm_drainage', 'norm_gvs', 'norm_tko', ],
                    [
                        'clientOptions' => [
                            'alias' => 'decimal',
                            'digits' => 3,
                            'digitsOptional' => true,
                            'radixPoint' => ',',
                            'groupSeparator' => ' ',
                            'autoGroup' => true,
                            'removeMaskOnSubmit' => true,
                        ]
                    ],
                    'meter^3'
                ],

                [
                    ['kol'],
                    [
                        'clientOptions' => [
                            'alias' => 'decimal',
                            'digits' => 0,
                            'digitsOptional' => false,
                            'groupSeparator' => ' ',
                            'autoGroup' => true,
                            'removeMaskOnSubmit' => true,
                        ]
                    ],
                    'humans'
                ],
            [
                ['size_ipu_heating_one', 'size_odpu_heating', 'size_ipu_heating_all', 'size_ipu_heating_diff', 'size_odpu_corrects_oneyear',
                    'size_odpu_corrects_twoyear', 'size_heating_all_average_last_year'],
                [
                    'clientOptions' => [
                        'alias' => 'decimal',
                        'digits' => 3,
                        'digitsOptional' => true,
                        'radixPoint' => ',',
                        'groupSeparator' => ' ',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ]
                ],
                'GKL'
            ],

            [
                ['size_ipu_energy', 'norm_energy'],
                [
                    'clientOptions' => [
                        'alias' => 'decimal',
                        'digits' => 3,
                        'digitsOptional' => true,
                        'radixPoint' => ',',
                        'groupSeparator' => ' ',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ]
                ],
                'Квт/час'
            ],

                [
                    ['gvs_multiplier_heating','norm_soi_hvs','norm_soi_gvs',
                        'norm_soi_drainage', 'multiplier_soi_gvs'],
                    [
                        'clientOptions' => [
                            'alias' => 'decimal',
                            'digits' => 4,
                            'digitsOptional' => true,
                            'radixPoint' => ',',
                            'groupSeparator' => ' ',
                            'autoGroup' => true,
                            'removeMaskOnSubmit' => true,
                        ]
                    ],
                    'meter^3/meter^2'
                ],

                [
                    ['norm_heating_house', 'norm_heating_mkd_odpu_not', 'size_heating_odpu_average_last_year',
                        'size_heating_ipu_average_last_year', 'size_heating_ipu_all_average_last_year'],
                    [
                        'clientOptions' => [
                            'alias' => 'decimal',
                            'digits' => 3,
                            'digitsOptional' => true,
                            'radixPoint' => ',',
                            'groupSeparator' => ' ',
                            'autoGroup' => true,
                            'removeMaskOnSubmit' => true,
                        ]
                    ],
                    'Гкал/meter^2'
                ],

                [
                    ['norm_soi_energy'],
                    [
                        'clientOptions' => [
                            'alias' => 'decimal',
                            'digits' => 3,
                            'digitsOptional' => true,
                            'radixPoint' => ',',
                            'groupSeparator' => ' ',
                            'autoGroup' => true,
                            'removeMaskOnSubmit' => true,
                        ]
                    ],
                    'КвтЧас/meter^2'
                ],

        ];

        foreach($array as $value) {
            if(in_array($variable, $value[0])) {
                return [$value[1], $value[2]];
            }
        }

        return false;

    }

    public function viewVar($str) {

        $tail = '.gif';
        $config = [

            'pays_pre_year' => 'images/formuls/pays_corrects_lastyear' . $tail,
            'size_odpu_corrects_oneyear' => 'images/formuls/size_corrects_oneyear' . $tail,
            'size_odpu_corrects_twoyear' => 'images/formuls/size_corrects_twoyear' . $tail,
            'space_all' => 'images/formuls/space_corrects_all' . $tail,
            'tariff_corrects_oneyear' => 'images/formuls/tariff_corrects_oneyear' . $tail,
            'tariff_corrects_twoyear' => 'images/formuls/tariff_corrects_twoyear' . $tail,

            'tariff' => 'images/formuls/simple_tariff' . $tail,
            'tariff_hvs' => 'images/formuls/simple_tariff' . $tail,
            'tariff_energy' => 'images/formuls/simple_tariff' . $tail,
            'tariff_drainage' => 'images/formuls/simple_tariff' . $tail,
            'tariff_gvs' => 'images/formuls/simple_tariff' . $tail,

            'size_ipu' => 'images/formuls/simple_ipu_size' . $tail,
            'size_ipu_hvs_drainage' => 'images/formuls/simple_ipu_size' . $tail,
            'size_ipu_energy' => 'images/formuls/simple_ipu_size' . $tail,

            'norm' => 'images/formuls/normativ' . $tail,
            'norm_energy' => 'images/formuls/normativ' . $tail,
            'norm_hvs' => 'images/formuls/normativ' . $tail,
            'norm_gvs' => 'images/formuls/normativ' . $tail,
            'norm_drainage' => 'images/formuls/normativ' . $tail,

            'kol' => 'images/formuls/kol_jil' . $tail,
            'size_odpu' => 'images/formuls/size_odpu_hvs' . $tail,
            'size_notliv_all' => 'images/formuls/size_all_noliv_hvs' . $tail,
            'size_ipu_all' => 'images/formuls/size_all_ipu_liv' . $tail,
            'size_not_ipu_all' => 'images/formuls/size_all_hvs_not_ipu' . $tail,
            'space_owner' => 'images/formuls/space_owner' . $tail,
            'space_full_all' => 'images/formuls/space_all_hvs' . $tail,
            'size2service_hvs' => 'images/formuls/serv2hvs' . $tail,
            'norm2odn' => 'images/formuls/hvs_norm_odpu' . $tail,
            'space_oi_all' => 'images/formuls/hvs_soi' . $tail,
            'multiplier' => 'images/formuls/multiplier' . $tail,
            'tariff_gvs_heating' => 'images/formuls/tariff_heating' . $tail,
            'tariff_gvs_teplonos' => 'images/formuls/tariff_teplonos' . $tail,
            'gvs_multiplier_heating' => 'images/formuls/multiplier_heating' . $tail,
            'norm_heating_house' => 'images/formuls/normativ' . $tail,
            'multiplier_house' => 'images/formuls/multiplier' . $tail,
            'tariff_heating_house' => 'images/formuls/simple_tariff' . $tail,

            //'size_heating_odpu_average_last_year', 'size_heating_ipu_average_last_year', 'size_heating_ipu_all_average_last_year',
            //'size_heating_all_average_last_year', 'space_heating_where_exists_ipu'
            'norm_heating_mkd_odpu_not' => 'images/formuls/normativ' . $tail,
            'space_soi' => 'images/formuls/space_soi' . $tail,
            'space_heating_mkd_odpu_not_ipu_not' => 'images/formuls/space_heating_ipu_not' . $tail,
            'tariff_heating_mkd_odpu_not' => 'images/formuls/simple_tariff' . $tail,

            'size_heating_odpu_average_last_year' => 'images/formuls/heating_mkd_odpu_123' . $tail,
            'size_heating_ipu_average_last_year' => 'images/formuls/heating_ipu_size' . $tail,
            'size_heating_ipu_all_average_last_year' => 'images/formuls/heating_size_ipu_1' . $tail,
            'size_heating_all_average_last_year' => 'images/formuls/qwertyd' . $tail,
            'space_heating_where_exists_ipu' => 'images/formuls/space_ipu_exists1' . $tail,
            'norm_tko' => 'images/formuls/normativ' . $tail,
            'tariff_tko' => 'images/formuls/simple_tariff' . $tail,
            'norm_soi_hvs' => 'images/formuls/normativ' . $tail,
            'norm_soi_gvs' => 'images/formuls/normativ' . $tail,
            'norm_soi_drainage' => 'images/formuls/normativ' . $tail,
            'norm_soi_energy' => 'images/formuls/normativ' . $tail,
            'multiplier_soi_gvs' => 'images/formuls/multiplier' . $tail,

        ];

        return $config[$str];

    }

    public function routeCalculationVaribles($number) {



        //Электроэнергия//
        if($number == 31) {
            $this->calc_conf = json_encode(['tariff_energy', 'size_ipu_energy']);
        }

        if($number == 41) {
            $this->calc_conf = json_encode(['tariff_energy', 'norm_energy', 'kol']);
        }

        if($number == 51) {
            $this->calc_conf = json_encode(['tariff_energy', 'norm_energy', 'kol', 'multiplier']);
        }
        //**************//




        //Холодная вода//
        if($number == 33) {
            $this->calc_conf = json_encode(['tariff_hvs', 'size_ipu_hvs_drainage']);
        }

        if($number == 43) {
            $this->calc_conf = json_encode(['tariff_hvs', 'norm_hvs', 'kol']);
        }

        if($number == 53) {
            $this->calc_conf = json_encode(['tariff_hvs', 'norm_hvs', 'kol', 'multiplier']);
        }
        //**************//





        //Водоотведение//
        if($number == 34) {
            $this->calc_conf = json_encode(['tariff_drainage', 'size_ipu_hvs_drainage']);
        }

        if($number == 44) {
            $this->calc_conf = json_encode(['tariff_drainage', 'norm_drainage', 'kol']);
        }

        if($number == 54) {
            $this->calc_conf = json_encode(['tariff_drainage', 'norm_drainage', 'kol', 'multiplier']);
        }
        //**************//


        //Горячее водоснабжение//
        if($number == 32) {
            $this->calc_conf = json_encode(['tariff_gvs', 'size_ipu_hvs_drainage']);
        }

        if($number == 42) {
            $this->calc_conf = json_encode(['tariff_gvs', 'norm_gvs', 'kol']);
        }

        if($number == 52) {
            $this->calc_conf = json_encode(['tariff_gvs', 'norm_gvs', 'kol', 'multiplier']);
        }
        //**************//


        //Горячее водоснабжение нецентральное водоснабжение//
        if($number == 322) {
            $this->calc_conf = json_encode(['space_owner', 'size_ipu_hvs_drainage', 'gvs_multiplier_heating', 'tariff_gvs_teplonos', 'tariff_gvs_heating']);
        }

        if($number == 422) {
            $this->calc_conf = json_encode(['space_owner', 'gvs_multiplier_heating', 'norm_gvs', 'tariff_gvs_teplonos', 'tariff_gvs_heating']);
        }

        if($number == 522) {
            $this->calc_conf = json_encode(['space_owner', 'gvs_multiplier_heating', 'norm_gvs', 'multiplier', 'tariff_gvs_teplonos', 'tariff_gvs_heating']);
        }
        //**************//

        //корректировка по отоплению
        if($number == 9)
        {
            $this->calc_conf = json_encode(['pays_pre_year', 'size_odpu_corrects_oneyear', 'size_odpu_corrects_twoyear', 'space_all', 'space_owner' , 'tariff_corrects_oneyear',
                               'tariff_corrects_twoyear']);
        }

        if($number == 10) {
            $this->calc_conf = json_encode(['space_owner', 'norm_heating_house', 'multiplier_house', 'tariff_heating_house',]);
        }

        if($number == 11) {
            $this->calc_conf = json_encode(['space_owner', 'norm_heating_mkd_odpu_not', 'space_all', 'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'multiplier_house', 'tariff_heating_mkd_odpu_not']);
        }

        if($number == 12) {
            $this->calc_conf = json_encode(['space_owner', 'size_heating_odpu_average_last_year','size_heating_ipu_average_last_year',
                'size_heating_ipu_all_average_last_year', 'space_all', 'tariff_heating_house']);
        }

        if($number == 13) {
            $this->calc_conf = json_encode(['space_owner', 'size_heating_odpu_average_last_year', 'space_all', 'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'tariff_heating_mkd_odpu_not']);
        }

        if($number == 14) {
            $this->calc_conf = json_encode(['space_owner', 'size_heating_odpu_average_last_year',
                'size_heating_ipu_average_last_year', 'space_all',
                'size_heating_all_average_last_year',
                'space_heating_where_exists_ipu', 'tariff_heating_mkd_odpu_not']);
        }









        if($number == 21) {
            $this->calc_conf = json_encode(['space_owner', 'space_soi', 'space_all', 'norm_soi_energy', 'tariff_energy']);
        }
        if($number == 22) {
            $this->calc_conf = json_encode(['space_owner', 'space_soi', 'space_all', 'norm_soi_gvs', 'tariff_gvs']);
        }
        if($number == 23) {
            $this->calc_conf = json_encode(['space_owner', 'space_soi', 'space_all', 'norm_soi_hvs', 'tariff_hvs']);
        }
        if($number == 24) {
            $this->calc_conf = json_encode(['space_owner', 'space_soi', 'space_all', 'norm_soi_drainage', 'tariff_drainage']);
        }
        //space_owner
        //space_soi
        //space_all
        //multiplier_soi_gvs;
        //norm_soi_gvs
        //tariff_gvs_teplonos
        //tariff_gvs
        if($number == 25) {
            $this->calc_conf = json_encode(['space_owner', 'space_soi', 'space_all', 'multiplier_soi_gvs',
                'norm_soi_gvs', 'tariff_gvs_teplonos', 'tariff_heating_house']);
        }



        if($number == 2) {
            $this->calc_conf = json_encode(['kol', 'norm_tko', 'tariff_tko']);
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




        if($number == 20) {
            $this->calc_conf = json_encode(['tariff', 'space_owner', 'space_full_all','size_ipu_heating_one', 'size_odpu_heating', 'size_ipu_heating_all']);
        }




        return true;
    }

    public function routeCalc($value) {

        // Электроэнергия //
        if($value == 31) {
            return $this->calcThree();
        }

        if($value == 41) {
            return $this->calcFour();
        }

        if($value == 51) {
            return $this->calcFive();
        }
        // ************* //



        // Холодная вода //
        if($value == 33) {
            return $this->calcThree();
        }

        if($value == 43) {
            return $this->calcFour();
        }

        if($value == 53) {
            return $this->calcFive();
        }
        // ************* //


        // Холодная вода //
        if($value == 34) {
            return $this->calcThree();
        }

        if($value == 44) {
            return $this->calcFour();
        }

        if($value == 54) {
            return $this->calcFive();
        }
        // ************* //


        // Горячая вода централизованная система//
        if($value == 322) {
            return $this->calcSix();
        }

        if($value == 422) {
            return $this->calcSeven();
        }

        if($value == 522) {
            return $this->calcEight();
        }
        // ************* //

        //heating
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
            return $this->calcTwelve();
        }

        if($value == 13) {
            return $this->calcThirteen();
        }

        if($value == 14) {
            return $this->calcFourteen();
        }





        if(in_array($value, [21,22,23,24])) {
            return $this->calcOne();
        }




        if($value == 25) {
            return $this->calcTwentyFive();
        }
        if($value == 2) {
            return $this->calcTwo();
        }

        return false;
    }

    /**
     * ниже формулы под расчет отопления
     * 9 - расчет корректировки по отоплению
     * 10 - расчет для жилого дома, который не оборудован ИПУ
     * 11 - расчет для МКД, который не оборудован ОДПУ
     * 12 - расчет для МКД, который оборудован ОДПУ и полностью ИПУ
     * 13 - расчет для МКД, который оборудован ОДПУ и полностью не оборудован ИПУ
     * 14 - расчет для МКД, который оборудован ОДПУ и частично ИПУ
     */
    public function calcNine()
    {
        //['pays_pre_year', 'size_odpu_corrects_oneyear', 'size_odpu_corrects_twoyear', 'space_all', 'space_owner' , 'tariff_corrects_oneyear',
        //                               'tariff_corrects_twoyear']
        $array = $this->calc_conf;
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];
        $f = $array[5];
        $g = $array[6];
        $this->result[] ='Итого:' . round(($this->$b*$this->$f + $this->$c*$this->$g)/$this->$d*$this->$e-$this->$a, 2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;
    }

    public function calcTen()
    {
        $array = $this->calc_conf;
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $this->result[] = 'Размер платы в текущем месяце:<b>' . round( $this->$a * $this->$b * $this->$c * $this->$d, 2) . '</b>';
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;
    }

    public function calcEleven()
    {
        //['space_owner', 'norm_heating_mkd_odpu_not', 'space_all', 'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'multiplier_house', 'tariff_heating_mkd_odpu_not']
        //C6*C9*C7*C11*(C8-C10)
        //C8*(C8-C10+C9)
        //(C14/C15+C13)*C12
        $array = $this->calc_conf;
        $a = $array[0]; //c6
        $b = $array[1];//c7
        $c = $array[2];//c8
        $d = $array[3];//c9
        $e = $array[4];//c10
        $f = $array[5];//c11
        $g = $array[6];//c12
        $tmp1 = ($this->$b*$this->$f*($this->$c - $this->$e))/($this->$c - $this->$e + $this->$d); //c13
        $tmp2 = $this->$a * $this->$d * $this->$b * $this->$f * ($this->$c - $this->$e); //c14
        $tmp3 = $this->$c * ($this->$c - $this->$e + $this->$d);//c15



        $this->result[] = round( ($tmp2 /$tmp3 + $tmp1) * $this->$g, 2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;
    }

    public function calcTwelve()
    {
        //json_encode(['space_owner', 'size_heating_odpu_average_last_year', size_heating_ipu_average_last_year
        //                'size_heating_ipu_all_average_last_year', 'space_all', 'tariff_heating_house'])
        $array = $this->calc_conf;
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];
        $f = $array[5];



        $this->result[] ='Размер платы в текущем месяце:' .  round( ($this->$c + (($this->$b - $this->$d)*$this->$a)/$this->$e)*$this->$f, 2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;
    }

    public function calcThirteen() {
        //['space_owner', 'norm_heating_mkd_odpu_not', 'space_all', 'space_soi', 'space_heating_mkd_odpu_not_ipu_not', 'tariff_heating_mkd_odpu_not']
        //c7/(c8 - c10 + c9) -- c13
        //c8 * c13  --c14
        //C6*(c7 - c14) -- c15
        //C8  -- c16
        //C6*c7/(c8 - c10 +c9) -- c12
        $array = $this->calc_conf;
        $a = $array[0]; //c6
        $b = $array[1];//c7
        $c = $array[2];//c8
        $d = $array[3];//c9
        $e = $array[4];//c10
        $f = $array[5];//c11
        $tmp1 = $this->$b/($this->$c - $this->$e + $this->$d); //c13
        $tmp2 = $this->$c * $tmp1; // c14
        $tmp3 = $this->$a*($this->$b - $tmp2); // c15
        $tmp4 = $this->$c; //c16
        $tmp5 = $this->$a*$this->$b/($this->$c - $this->$e + $this->$d); //c12



        $this->result[] = round( ($tmp3/$tmp4 + $tmp5)*$this->$f,2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;

    }

    public function calcFourteen() {
        //space_owner
        //size_heating_odpu_average_last_year
        //size_heating_ipu_average_last_year
        //space_all
        //size_heating_all_average_last_year
        //space_heating_where_exists_ipu
        //tariff_heating_mkd_odpu_not = '1467,82'


        //c10/c11 -- c13
        //c10+(c9 - c11)*c13  --c14
        //C6*(c7 - c14) -- c15
        //C9  -- c16
        //(c15/c16+c8)*c12
        $array = $this->calc_conf;
        $a = $array[0]; //c6
        $b = $array[1];//c7
        $c = $array[2];//c8
        $d = $array[3];//c9
        $e = $array[4];//c10
        $f = $array[5];//c11
        $g = $array[6];//c12

        $tmp1 = $this->$e/$this->$f; //c13
        $tmp2 = $this->$e + ($this->$d - $this->$f) * $tmp1; // c14
        $tmp3 = $this->$a*($this->$b - $tmp2); // c15
        $tmp4 = $this->$d; //c16

        $this->result[] = round( ($tmp3/$tmp4 + $this->$c)*$this->$g,2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;

    }
    /**
     ********************************************************************************
     */


    /**
     * ниже приведен расчет формул для ГВС(централизованная система), ХВС, Электроэнергия, Водоотведение
     * 3 - если ИПУ установлен
     * 4 - если у ИПУ срок поверки не истек и показания по нему не передаются
     * 5 - если срок поверки ИПУ истек или он не установлен
     */
    public function calcThree() {
        $array = $this->calc_conf;
        $e = $array[0];
        $f = $array[1];

        $this->result[]='Итого:' . round($this->$e * $this->$f, 2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;


    }

    public function calcFour() {
        $array = $this->calc_conf;
        $e = $array[0];
        $f = $array[1];
        $a = $array[2];

        $this->result[] = 'Итого:' .round($this->$e * $this->$f * $this->$a, 2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;
    }

    public function calcFive() {
        $array = $this->calc_conf;
        $e = $array[0];
        $f = $array[1];
        $a = $array[2];
        $b = $array[3];

        $this->result[] = 'Итого:' .round($this->$e * $this->$f * $this->$a * $this->$b, 2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;
    }
    /**
     *****************************************************************************/




   //Горячая вода
    public function calcEight()
    {
        $array = $this->calc_conf;
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];
        $f = $array[5];

        $this->result[0] = 'Размер платы в текущем месяце (компонент на теплоноситель): <b>' . round((1 * $this->$e * $this->$d * $this->$c), 2) . '</b>';
        $this->result[1] = 'Размер платы в текущем месяце (компонент на подогрев): <b>' . round((1 * $this->$b * $this->$c * $this->$d * $this->$f), 2) . '</b>';

        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }



        return true;
    }

    public function calcSeven()
    {

        $array = $this->calc_conf;
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];

        $this->result[0] = 'Размер платы в текущем месяце (компонент на теплоноситель): <b>' . round((1 * $this->$c* $this->$d), 2) . '</b>';
        $this->result[1] = 'Размер платы в текущем месяце (компонент на подогрев): <b>' . round((1 * $this->$b * $this->$c * $this->$e), 2) . '</b>';

        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }

        return true;

    }

    public function calcSix() {
        $array = $this->calc_conf;
        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];

        $this->result[0] = 'Размер платы в текущем месяце (компонент на теплоноситель): <b>' . round((1 * $this->$b* $this->$d), 2) . '</b>';
        $this->result[1] = 'Размер платы в текущем месяце (компонент на подогрев): <b>' . round((1 * $this->$b * $this->$c * $this->$e), 2) . '</b>';

        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }

        return true;

    }
    //конец горячей воды





    //СОИ
    public function calcOne() {
        $array = $this->calc_conf;

        $a = $array[0];
        $b = $array[1];
        $c = $array[2];
        $d = $array[3];
        $e = $array[4];

        $this->result[] = round( $this->$d*$this->$b/$this->$c*$this->$e*$this->$a,2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;
    }

    //TKO
    public function calcTwo() {

        $array = $this->calc_conf;

        $a = $array[0];
        $b = $array[1];
        $c = $array[2];

        $this->result[] = round( $this->$b*$this->$c/12*$this->$a,2);
        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }
        return true;

    }

    public function calcTwentyFive() {
        //space_owner
        //space_soi
        //space_all
        //multiplier_soi_gvs;
        //norm_soi_gvs
        //tariff_gvs_teplonos
        //tariff_gvs

        $array = $this->calc_conf;
        $a = $array[0];//c6
        $b = $array[1];//c7
        $c = $array[2];//c8
        $d = $array[3];//c9
        $e = $array[4];//c10
        $f = $array[5];//c11
        $g = $array[6];//c12

        $this->result[0] = 'Размер платы в текущем месяце (компонент на теплоноситель): <b>' . round($this->$e*$this->$b/$this->$c*$this->$f*$this->$a, 2) . ' руб</b>';
        $this->result[1] = 'Размер платы в текущем месяце (компонент на подогрев): <b>' . round($this->$e*$this->$d*$this->$b/$this->$c*$this->$g*$this->$a, 2) . ' руб</b>';

        foreach($array as $value) {
            $this->$value = str_replace('.', ',', $this->$value);
        }



        return true;


    }


}