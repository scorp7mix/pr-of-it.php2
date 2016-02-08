<?php

require __DIR__ . '/../autoload.php';

$article = \App\Models\News::findByID(1);

var_dump(isset($article->author));
var_dump(isset($article->author->id));