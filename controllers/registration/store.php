<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email    = $_POST['email'];
$password = $_POST['password'];


//validate the input data
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'password must be between 7 and 255 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

//check if email is already taken

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

//post or redirect to the home page

if ($user) {

    header('location: /');
    exit();

} else {

    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email'    => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    //log in the user
    $_SESSION['user'] = [
        'email' => $email,
    ];

    header('location: /');
    exit();

}