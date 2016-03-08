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

    protected function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k || '' === $v) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $columns) . ')
            VALUES (' . implode(',', array_keys($values)) . ')';
        $db = Db::instance();
        $db->execute($sql, $values);
        $this->id = $db->getNewId();
        return $this;
    }

    protected function update()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k . '=:' . $k;
            $values[':' . $k] = ('' === $v) ? null : $v;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $columns) . '
            WHERE id = ' . (int)$this->id;
        $db = Db::instance();
        $db->execute($sql, $values);
        return $this;
    }

    public function save()
    {
       return $this->isNew() ? $this->insert() : $this->update();
    }

    public function delete()
    {
        if ($this->isNew()) {
            return;
        }

        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = ' . (int)$this->id;
        $db = Db::instance();
        $db->execute($sql);
        $this->id = null;
        return $this;
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

        return $db->queryEach(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY ' . $field . ' DESC LIMIT ' . $limit,
            static::class
        );
    }

    public function fillByPost($post)
    {
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $this->$k = $post[$k] ?? $this->$k;
        }
    }
}
