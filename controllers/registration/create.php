<?php

// if ($_SESSION['user'] ?? false) {
//     header('Location: /');
//     exit();
// }

view('registration/create.view.php', [
    'headings' => 'Register',
]);