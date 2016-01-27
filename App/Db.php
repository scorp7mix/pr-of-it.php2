<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=pr-of-it.php2;charset=utf8', 'root', '');
    }

    public function execute($sql)
    {
        return $this->dbh->prepare($sql)->execute();
    }

    public function query($sql, $class)
    {
        $sth = $this->dbh->prepare($sql);

        if(false !== $sth->execute()) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        return [];
    }
}