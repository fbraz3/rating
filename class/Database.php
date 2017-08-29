<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 29/08/17
 * Time: 12:52 AM
 */


class Database{

    /**
     * @return PDO
     * @throws PDOException
     */
    public static function getPDO(){
        $dsn = 'mysql:dbname=' . Config::DBNAME . ';host=' . Config::HOST . ';charset=utf8';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        return new PDO($dsn, Config::USER, Config::PASS, $options);
    }
}