<?php

require __DIR__ . '/../../autoload.php';

$lastNews = \App\Models\News::findAll();

ob_start();

include __DIR__ . '/../../App/Templates/Admin/index.php';

echo ob_get_clean();
