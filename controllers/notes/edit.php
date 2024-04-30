<?php

//email validate check
// if (!Validator::email("a@a.com")) {
//     dd("Email is not valid");
// }

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$currentUserId = 1;


$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_GET['id']])->find();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
    'headings' => 'Edit Notes',
    'errors'   => [],
    'note'     => $note
]);