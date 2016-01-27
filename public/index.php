<?php

error_reporting(E_ALL);

require __DIR__ . '/../autoload.php';

$users = \App\Models\User::findAll();

var_dump($users);