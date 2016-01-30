<?php

namespace App;

use App\Core\Singleton;

class Db
{
    use Singleton;

    protected $dbh;
    protected $dbError;

    private function __construct()
    {
        $config = Config::instance()->db;
        $dsn = $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'] .
            ';charset=' . ($config['charset'] ?? 'utf8');
        $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
    }

    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);

        $this->dbError = $sth->errorInfo()[2];

        return $result;
    }

    public function query($sql, $class, $data = [])
    {
        $sth = $this->dbh->prepare($sql);

        if(false !== $sth->execute($data)) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        return [];
    }

    public function getNewId()
    {
        return $this->dbh->lastInsertId();
    }

    public function getError()
    {
        return $this->dbError;
    }
}