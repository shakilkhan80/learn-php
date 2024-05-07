<?php


use Core\Authenticator;
use Core\ValidationException;
use Http\Forms\LoginForm;
use Core\Session;


$form = LoginForm::validate($attributes = [
    'email'    => $_POST['email'],
    'password' => $_POST['password']
]);

$signIn = (new Authenticator)->attempt(

    $attributes['email'],
    $attributes['password']

);

if (!$signIn) {

    $form->error(
        'email',
        'No matching account found with this provided email or password'
    )
        ->throw();

}

redirect("/");


