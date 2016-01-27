<?php

error_reporting(E_ALL);

require __DIR__ . '/../autoload.php';

$user = \App\Models\User::findByID(1);

var_dump($user);