<?php

use Core\App;
use Core\Container;
use Core\DataBase;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new DataBase($config['database']);
});

App::setContainer($container);