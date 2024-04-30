<?php

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$currentUserId = 1;


$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_POST['id']])->find();

authorize($note['user_id'] === $currentUserId);



$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();


