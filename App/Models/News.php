<?php

namespace App\Models;

use App\Model;

class News extends Model
{
    const TABLE = 'news';

    public $title;
    public $text;
    public $author_id;
    public $date;

    public static function findLastRows($limit)
    {
        return self::findLastRowsByField('date', $limit);
    }
}
