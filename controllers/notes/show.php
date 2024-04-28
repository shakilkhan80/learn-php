<?php

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$currentUserId = 5;


$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_GET['id']])->find();

authorize($note['user_id'] === $currentUserId);


view('notes/show.view.php', [
    'headings' => 'Note',
    'note'     => $note
]);

