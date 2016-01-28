<?php

error_reporting(E_ALL);

require __DIR__ . '/../autoload.php';

$lastNews = \App\Models\News::findLastRows(3);

ob_start();

include __DIR__ . '/../App/Templates/index.php';

echo ob_get_clean();
