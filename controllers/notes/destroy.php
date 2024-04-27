<?php

use Core\DataBase;

$config = require base_path('config.php');

$db = new DataBase($config['database']);

$currentUserId = 5;


$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_POST['id']])->find();

authorize($note['user_id'] === $currentUserId);



$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();


