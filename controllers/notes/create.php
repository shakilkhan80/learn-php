<?php

use Core\DataBase;

use Core\Validator;

require base_path('Core/Validator.php');

$config = require base_path('config.php');

$db = new DataBase($config['database']);


//email validate check
// if (!Validator::email("a@a.com")) {
//     dd("Email is not valid");
// }

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!Validator::string($_POST['body'], 1, 100)) {

        $errors['body'] = "Your body filed is too long or is required";

    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            ':body'    => $_POST['body'],
            ':user_id' => 5
        ]);
    }


}

view('notes/create.view.php', [
    'headings' => 'Create Notes',
    'errors'   => $errors
]);