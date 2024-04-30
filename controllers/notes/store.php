<?php

use Core\Validator;
use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 100)) {

    $errors['body'] = "Your body filed is too long or is required";

}
if (!empty($errors)) {
    
    return view('notes/create.view.php', [
        'headings' => 'Create Notes',
        'errors'   => $errors
    ]);
}


$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    ':body'    => $_POST['body'],
    ':user_id' => 1
]);

header('location: /notes');
die();


