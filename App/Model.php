<?php

namespace App;

abstract class Model
{
    const TABLE = '';

    public $id;

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $columns) . ')
            VALUES (' . implode(',', array_keys($values)) . ')';
        $db = Db::instance();
        $result = $db->execute($sql, $values);
        if ($result) {
            $this->id = $db->getNewId();
            return $this;
        }

        throw new \Exception('Ошибка добавления записи в базу (' . $db->getError() . ')');
    }

    public function update()
    {
        if ($this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k . '=:' . $k;
            $values[':' . $k] = $v;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $columns) . '
            WHERE id = ' . (int)$this->id;
        $db = Db::instance();
        $result = $db->execute($sql, $values);
        if ($result) {
            return $this;
        }

        throw new \Exception('Ошибка обновления записи в базе (' . $db->getError() . ')');
    }

    public static function findAll()
    {
        $db = Db::instance();

        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findByID($id)
    {
        $db = Db::instance();

        $result = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id = :id',
            static::class,
            ['id' => $id]
        );

        return $result[0] ?: false;
    }

    protected static function findLastRowsByField($field, $limit)
    {
        $db = Db::instance();

        $result = $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY ' . $field . ' DESC LIMIT ' . $limit,
            static::class
        );

        return $result ?: false;
    }
}
