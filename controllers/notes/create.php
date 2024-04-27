<?php

//email validate check
// if (!Validator::email("a@a.com")) {
//     dd("Email is not valid");
// }


view('notes/create.view.php', [
    'headings' => 'Create Notes',
    'errors'   => []
]);