<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    session_start();

    $paginaHTML=file_get_contents("index.html");

    echo $paginaHTML;