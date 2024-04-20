<?php

require 'functions.php';
require 'Database.php';
// require 'route.php';

$config = require 'config.php';

$db = new DataBase($config['database']);

$id = ($_GET['id']);

$query = "SELECT * FROM posts where id = :id";

$posts = $db->query($query, ['id' => $id])->fetch();

//connect to mysql database

dd($posts['title']);