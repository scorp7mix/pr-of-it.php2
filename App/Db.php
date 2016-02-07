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
        $this->dbh = new \PDO($dsn, $dbc->user, $dbc->password);
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