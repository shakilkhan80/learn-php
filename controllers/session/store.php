<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email    = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email';
}

if (!Validator::string($password)) {
    $errors['password'] = 'please provide a valid password';
}

if (!empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();


if ($user) {

    if (password_verify($password, $user['password'])) {

        login([
            'email' => $email,
        ]);

        header('Location: /');
        exit();

    }

}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No user found with that email and password'
    ]
]);
