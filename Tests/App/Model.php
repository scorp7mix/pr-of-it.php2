<?php

error_reporting(E_ALL);

set_exception_handler(function (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage() . "\n";
});

require __DIR__ . '/../tests.php';

/**
 * Check model insert method
 */
/*
$user = new \App\Models\User();
$user->name = 'Vasya';
$user->email = 'vasya@example.com';

*echo check(
    $user->insert()->id,
    'Model->insert method'
);
*/

/**
 * Check model update method
 */
/*
$user = \App\Models\User::findByID(2);
$user->name = 'Petya';

echo check(
    $user->update(),
    'Model->update method'
);
*/

/**
 * Check model save method
 */
$user = new \App\Models\User(2);
$user->name = 'Vasya';
$user->email = 'test@example.com';

echo check(
    $user->save(),
    'Model->save method on new model'
);
$user->email = 'vasya@example.com';
echo check(
    $user->save(),
    'Model->save method on existing model'
);

