<?php

error_reporting(E_ALL);

require __DIR__ . '/../tests.php';

$db = new \App\Db();

echo check(
    $db->execute("UPDATE users SET name = 'Петр Петров' WHERE id = 1"),
    'Db->execute method without data params'
);
echo check(
    $db->execute("UPDATE users SET name = 'Петр Петров' WHERE id = :id", ['id' => 1]),
    'Db->execute method with data params'
);
echo check(
    $db->query("SELECT * FROM users WHERE id = 1", \App\Models\User::class),
    'Db->query method without data params'
);
echo check(
    $db->query("SELECT * FROM users WHERE id = :id", \App\Models\User::class, ['id' => 1]),
    'Db->query method with data params'
);

