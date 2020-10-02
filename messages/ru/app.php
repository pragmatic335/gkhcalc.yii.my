<?php
return array (
    'AppName' => 'iSender',
    'Copyright' => '&copy; ООО "Прогматик", Россия. Новосибирск, 2019+',
    'Version' => 'v',

    'hotwater' => 'Горячее водоснабжение',
    'drainage' => 'Водоотведение',
    'energy' => 'Электроэнергия',
    'correct_heating' => 'Корректировка по отолению',

    'type_heating' => 'Отоплениe как услуга или корректировка?',
    'service_heating' => 'Отопление МКД',
    'type_heating_service' => 'Выберите необходимые условия для проведения расчетных действий',
    'note_type_heating_service' => 'Здесь что то должно просто быть',
    'heating_odpu_not' => 'ОДПУ нет',
    'heating_odpu_yes_ipu_not' => 'ОДПУ есть, ИПУ нет',
    'heating_odpu_yes_ipu_yes_nofull' => 'ОДПУ есть, ИПУ есть не везде',
    'heating_odpu_yes_ipu_yes_full' => 'ОДПУ есть, ИПУ есть везде',
    'type_house' => 'Тип Вашей собственности?',
    'note_type_house' => 'здесь что то надо написать',
    'MKD' => 'Многоквартирный дом',
    'solo_house' => 'Жилой дом с отсутствующим прибор учета',





    'coldwater' => 'Холодное водоснабжение',
    'choose services' => 'Выбор коммунальной услуги',
    'type meters' => 'Тип прибора учета',
    'type tariff' => 'Тип тарифа',
    "exists meter" => 'Наличие прибора учета',
    "type room" => 'Тип помещения',
    'apart' => 'Квартира',
    'house' => 'Жилой дом',
    'note type_room' => 'Выберите тип помещения по которому хотите произвести расчет',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    '6' => '6',
    'Гкал/meter^2' => 'Гкал/м²',



    'heating' => 'Отопление',
    'success_input' => 'Данные заполнены',
    'result' => 'Результат',


//<b>Общедомовой прибор учета</b> отражает потребление на всём многоквартирном доме. <br>


    'odpu' => 'Общедомовой прибор учета',
    'ipu' => 'Индивидуальный прибор учета',
    'note_services' => 'Выберите необходимую услугу для произведения расчетных действий.<br>Каждой услуги соответствует свои расчетные формулы.',
    'note_type_meters' => '<b>Индивидуальный прибор учета</b> - это прибор, который установлен непосредственно в Вашей квартире или жилом доме.',
    'note type_tariff' => 'Выберите тип тарифа',


    'note_odpu_check' => '<b>ДА</b> - прибор учета установлен и расчет будет происходить исходя из потребления за расчетный период.<br>
                            <b>НЕТ</b> - прибор учета отсутствует, что влечет за собой расчет по нормативу.',
    'note_ipu_check' => '<b>ДА</b> - прибор учета установлен и расчет будет происходить исходя из дальнеший выбираемых параметров.<br>
                            <b>НЕТ</b> - прибор учета отсутствует, что влечет за собой расчет по нормативу.',
    'note_notIpu_checkPossibility' => '<b>ДА</b> - Расчет по нормативу <b>с учетом</b> повышающего коэффициента.<br>
                            <b>НЕТ</b> - Вычисление по нормативу <b>без</b> повышающего коэффициента.',


    'onekom' => 'Однокомпонентный тариф',
    'twokom' => 'Двухкомпонентный тариф',



    'exists' => 'Да',
    'not exists' => 'Нет',
    'not exists and imposible setup' => 'ПУ -+',
    'formula' => 'Произвести расчет',
    'exists setup' => 'У счетчика истек срок поверки?',

    'Yes' => 'Да',
    'Not' => 'Нет',
    'exists meter_odpu' => 'Имеется ли в наличии общедомовой прибор учета?',
    'exists meter_ipu_heating' => 'Существует ли хотя бы одно помещение, оборудованное индивидуальным прибором учета?',
    'exists meter_ipu_heating_all' => 'Все помещения в МКД оборудованны индивидуальными приборами учета?',
    "exists meter_ipu_heating_ on you" => 'В Вашей квартире установлен счетчик?',
    'setup main heating' => 'Ваша квартира отопливается центральной системой теплоснабжения?',





    "rub" => 'руб',
    "meter^2" => 'м²',
    'meter^3' => 'м³',
    'humans' => 'кол-во человек',
    'GKL' => 'Гкл',

    'mainNotes' => 'Дополнительная справочная информация',




    'choose_view_services' => 'Какой вид коммунальной услуги (коммунального ресурса на содержание общего имущества) Вас интересует?',
   'service2one' => 'Индивидуальное потребление',
   'TKO' => 'TKO',
   'SOI' => 'СОИ',
   'note_view_services' => 'Выберете вид услуги для произведения расчетных действий.<br> <b>Помните</b>, что на любом из шагов вы можете <b>вернуться и изменить свой выбор</b>.<br><br> 
<b>Индивидуальное потребление</b> - расчет по одной из следующих услуг: электроэнергия, горячее водоснабжение, холодное водоснабжение, водоотведение.<br>
<b>TKO</b> - Коммунальная услуга по обращению с твердыми коммунальными отходами.<br> 
<b>СОИ</b> - Коммунальные ресурсы на содержание общего имущества.<br>',

    'poverka' => 'Срок поверки прибора учета истек?',
    'note_poverka' => 'Каждый счетчик воды имеет <b>срок поверки</b> (или, официально, межповерочный интервал, МПИ).<br>
Это период, в течение которого производитель <b>гарантирует</b> правильный (с допустимой погрешностью) учет проходящей через счетчик воды.<br>
После того, как этот срок истечет, прибор учета необходимо поверить.',
    'give_pokaz' => 'Собираетесь ли Вы передавать показания?',
    'note_give_pokaz' => 'Показания по прибору учета должны передаваться в точности как отображено на его информационной панели.',
    'center_system' => 'Услуга подключена к централизованной системе водоснабжения?',
    'note_center_system' => '<b>ДА</b> - Горячая вода поступает из общего источника.<br>
                            <b>НЕТ</b> - Самостоятельное производство исполнителем коммунальной услуги по горячему водоснабжению с использованием оборудования, входящего в состав общего имущества собственников помещений в многоквартирном доме.',

    'meter^3/meter^2' => 'м³/м²',



    'note_type_heating' => '<b>Корректировка по отоплению</b> - что то здесь надо написать<br>
<b>Отопление МКД</b> - отопление как услуга в Вашем многоквартирном доме.',

    'odpu_exists' => 'Наличие общедомового прибора учета',
    'note_odpu_exists' => 'Наличие или отсутсвие общедомового прибора учета определяет соответсвующие правила расчета.'

);
