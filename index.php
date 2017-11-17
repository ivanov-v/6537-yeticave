<?php
    require_once('./functions.php');

    $is_auth = (bool) rand(0, 1);

    $user_name = 'Константин';
    $user_avatar = 'img/user.jpg';

    // устанавливаем часовой пояс в Московское время
    date_default_timezone_set('Europe/Moscow');

    // записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
    $lot_time_remaining = "00:00";

    // временная метка для полночи следующего дня
    $tomorrow = strtotime('tomorrow midnight');

    // временная метка для настоящего времени
    $now = strtotime('now');

    // разница во времени
    $difference = $tomorrow - $now;

    // далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
    $lot_time_remaining = format_time($difference);

    $lot_categories = [
        'boards' => 'Доски и лыжи',
        'attachment' => 'Крепления',
        'boots' => 'Ботинки',
        'clothing' => 'Одежда',
        'tools' => 'Инструменты',
        'other' => 'Разное'
    ];

    $lots = [
        [
            'title' => '2014 Rossignol District Snowboard',
            'category' => 'Доски и лыжи',
            'price' => 10999,
            'img' => 'img/lot-1.jpg'
        ],
        [
            'title' => 'DC Ply Mens 2016/2017 Snowboard',
            'category' => 'Доски и лыжи',
            'price' => 159999,
            'img' => 'img/lot-2.jpg'
        ],
        [
            'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
            'category' => 'Крепления',
            'price' => 8000,
            'img' => 'img/lot-3.jpg'
        ],
        [
            'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
            'category' => 'Ботинки',
            'price' => 10999,
            'img' => 'img/lot-4.jpg'
        ],
        [
            'title' => 'Куртка для сноуборда DC Mutiny Charocal',
            'category' => 'Одежда',
            'price' => 7500,
            'img' => 'img/lot-5.jpg'
        ],
        [
            'title' => 'Маска Oakley Canopy',
            'category' => 'Разное',
            'price' => 5400,
            'img' => 'img/lot-6.jpg'
        ]
    ];

    $index = renderTemplate('./templates/index.php', [
        'lot_categories' => $lot_categories,
        'lots' => $lots,
        'lot_time_remaining' => $lot_time_remaining
    ]);

    $layout = renderTemplate('./templates/layout.php', [
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'title' => 'Главная',
        'content' => $index
    ]);

    print($layout);
?>