<?php

require __DIR__ . '/tests.php';

$config = \App\Config::instance();

/**
 * Check if parameter 'db' exists in config
 */
echo check(
    $config->db,
    'Config->db'
);

/**
 * Check if key 'host' exists in parameter 'db' of config
 */
echo check(
    isset($config->db['host']),
    'Config->db[host]'
);

