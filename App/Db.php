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
        $dbc = Config::instance()['db'];
        $dsn = $dbc->driver . ':host=' . $dbc->host . ';dbname=' . $dbc->dbname .
            ';charset=' . ($dbc->charset ?? 'utf8');

        try {
            $this->dbh = new \PDO($dsn, $dbc->user, $dbc->password);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db('Не удалось подключиться к базе данных');
        }
    }

    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);

        try {
            $result = $sth->execute($data);
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db('Ошибка при выполнении запроса');
        }

        return $result;
    }

    public function query($sql, $class, $data = [])
    {
        $sth = $this->dbh->prepare($sql);

        try {
            $sth->execute($data);
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db('Ошибка при выполнении запроса');
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function getNewId()
    {
        return $this->dbh->lastInsertId();
    }
}
