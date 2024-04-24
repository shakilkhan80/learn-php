<?php
$config = require 'config.php';

$db = new DataBase($config['database']);


$headings      = "My Notes";
$currentUserId = 5;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_GET['id']])->find();

authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";