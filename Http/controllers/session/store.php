<?php


use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;


$email    = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm;

if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {

        redirect("/");

    }

    $form->error('email', 'Invalid email or password');


}

Session::flash('_flash', $form->errors());
Session::flash('old', [
    'email' => $_POST['email']
]);

return redirect('/login');





