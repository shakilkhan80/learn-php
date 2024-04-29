<?php

use Core\Validator;
use Core\Database;
use Core\App;

//first find the note

$db = App::resolve(Database::class);

$currentUserId = 5;


$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_POST['id']])->findOrFail();
//authorize the current user

authorize($note['user_id'] === $currentUserId);

//validate the data

$errors = [];

if (!Validator::string($_POST['body'], 1, 100)) {

    $errors['body'] = "Your body filed is too long or is required";

}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors'  => $errors,
        'note'    => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id'   => $_POST['id']
]);

header("location: /notes");

die();