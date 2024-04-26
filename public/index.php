<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {

    
    $result = str_replace('\\', '/', $class);

    require base_path("{$result}.php");

});

require base_path('Core/route.php');



