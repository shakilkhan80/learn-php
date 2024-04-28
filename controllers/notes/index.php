<?php

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 5;')->all();


view('notes/index.view.php', [
    'headings' => 'My Notes',
    'notes'    => $notes
]);