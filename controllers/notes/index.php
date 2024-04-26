<?php

use Core\DataBase;

$config = require base_path('config.php');

$db = new DataBase($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 5;')->all();


view('notes/index.view.php', [
    'headings' => 'My Notes',
    'notes'    => $notes
]);