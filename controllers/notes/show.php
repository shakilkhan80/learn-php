<?php

use Core\DataBase;

$config = require base_path('config.php');

$db = new DataBase($config['database']);

$currentUserId = 5;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_GET['id']])->find();

    authorize($note['user_id'] === $currentUserId);



    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id']
    ]);

    header('location: /notes');
    exit();

} else {


    $note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_GET['id']])->find();

    authorize($note['user_id'] === $currentUserId);


    view('notes/show.view.php', [
        'headings' => 'Note',
        'note'     => $note
    ]);
}

