<?php
/**
 * Created by PhpStorm.
 * User: Максим В. Янушев
 * Date: 12.10.15
 * Time: 20:56
 */

$company=array(
    'О компании' => array_flip(array(
        'О нас'=>'about',
//        'Стратегия'=>'strategy',
//        'Наша команда'=>'team',
//        'Экосистема'=>'eco',
        'Наши партнеры'=>'partners',
//        'Нащи достижения'=>'achievements',
        'Контакты'=>'contacts',
    )));
$solutions=array(
    'Системные решения'=>array_flip(array(
    'Государственные услуги в субъекте РФ'=>'government',
    'Контроль сбора, логистика и утилизации отходов'=>'waste_management',
    'Контроль биологических угроз на ж/д транспорте'=>'rail_bio',
    'Мониторинг эпизоотической ситуации в режиме реального времени'=>'veterinary',
    'Распространение лекаственных препаратов'=>'pharma',
    'Система акустического мониторинга'=>'acoust'
)));
$products=array(
    'Продукты'=>array_flip(array(
        'Логистика мусора'=>'garbage',
        'Контроль пассажиропотока'=>'passenger_traffic',
//        'Учет билетов на транспорте'=>'tickets_control',
//        'Акустический мониторинг'=>'acoustic_monitoring',
        'Производственная логистика'=>'productionlogistics',
//        'Дистрибьюция алкоголя'=>'alcodistribution',
    ))
);
$news=array('Новости'=>'news');
$elements=array(
    'Элементы'=>array_flip(array(
            'Метки'=>'rfid_tags',
            'Карты'=>'smart_cards',
            'Антенны'=>'antennas',
            'Оборудование'=>'devices',
    ))
);
//Только для разработки. Убить перед релизом
$dev=array(
    'РАЗРАБОТКА'=>array_flip(array(
        '(Временно)Биоанализатор'=>'bio',
        '(Временно)Акустический детектор'=>'acoust_detector',
        '(Временно)Чемодан ветеринара'=>'vet_case',
        'Старые новости'=>'old_news',
        'ПРИМЕР ОФОРМЛЕНИЯ ТЕКСТА'=>'text',
    ))
);
//
$contact=array('Контакты'=>'contacts');
$app['menu']=array_merge(
                    $company,$solutions,$products,$elements,$news,$contact,$dev
);

