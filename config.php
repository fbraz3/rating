<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 25/08/2017
 * Time: 23:48
 */

try{
    $dsn = 'mysql:dbname=app;host=localhost;charset=utf8';
    $user = 'root';
    $pass = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $db = new PDO($dsn, $user, $pass, $options);
}catch (PDOException $e){
    die('Erro: '.$e->getMessage());
}