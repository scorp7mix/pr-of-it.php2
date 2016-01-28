<?php

error_reporting(E_ALL);

require __DIR__ . '/../tests.php';

$db = new \App\Db();

/**
 * Check execute method if it returns false (row with id does not need to exist in database)
 */
echo check(
    $db->execute("UPDATE users SET name = 'Петр Петров' WHERE id = 7"),
    'Db->execute method without data params'
);
echo check(
    $db->execute("UPDATE users SET name = 'Петр Петров' WHERE id = :id", ['id' => 7]),
    'Db->execute method with data params'
);

/**
 * Check query method if it returns non zero array (row with id should exists in database table)
 */
echo check(
    $db->query("SELECT * FROM users WHERE id = 1", \App\Models\User::class),
    'Db->query method without data params'
);
echo check(
    $db->query("SELECT * FROM users WHERE id = :id", \App\Models\User::class, ['id' => 1]),
    'Db->query method with data params'
);

