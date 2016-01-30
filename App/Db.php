<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::instance()->db;
        $dsn = $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'] .
            ';charset=' . ($config['charset'] ?? 'utf8');
        $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
    }

    public function execute($sql, $data = [])
    {
        return $this->dbh->prepare($sql)->execute($data);
    }

    public function query($sql, $class, $data = [])
    {
        $sth = $this->dbh->prepare($sql);

        if(false !== $sth->execute($data)) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        return [];
    }
}