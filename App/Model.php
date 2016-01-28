<?php

namespace App;

abstract class Model
{
    const TABLE = '';

    public static function findAll()
    {
        $db = new Db();

        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findByID($id)
    {
        $db = new Db();

        $result = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id = :id',
            static::class,
            ['id' => $id]
        );

        return $result[0] ?: false;
    }

    protected static function findLastRowsByField($field, $limit)
    {
        $db = new Db();

        $result = $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY ' . $field . ' DESC LIMIT ' . $limit,
            static::class
        );

        return $result ?: false;
    }
}
