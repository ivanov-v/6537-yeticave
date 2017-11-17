<?php
    require_once('./functions.php');

    $tmp = renderTemplate('./templates/layout.php', [
        'title' => 'Заголовок',
        'content' => 'Контент'
    ]);

    echo $tmp;
?>