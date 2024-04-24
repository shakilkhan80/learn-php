<?php
$config = require 'config.php';

$db       = new DataBase($config['database']);
$headings = "My Notes";

$notes = $db->query('SELECT * FROM notes WHERE user_id = 5;')->all();


require "views/notes.view.php";