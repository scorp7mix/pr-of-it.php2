<?php

namespace App\Models;

use App\Model;

/**
 * Class News
 * @package App\Models
 *
 * @property Author $author
 */
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

    /**
     * @param $name
     * @return Author
     */
    public function __get($name)
    {
        if ('author' === $name && null !== $this->author_id) {
            return Author::findByID($this->author_id);
        }
        return false;
    }

    public function __isset($name)
    {
        if ('author' === $name && null !== $this->author_id) {
            return false !== $this->author;
        }
        return false;
    }
}
