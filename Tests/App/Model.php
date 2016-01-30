<?php

error_reporting(E_ALL);

set_exception_handler(function (\Exception $e) {
    echo 'Ошибка: ' . $e->getMessage() . "\n";
});

require __DIR__ . '/../tests.php';

$user = new \App\Models\User();
$user->name = 'Vasya';
$user->email = 'vasya@example.com';

/**
 * Check model insert method
 */
echo check(
    $user->insert()->id,
    'Model->insert method'
);

