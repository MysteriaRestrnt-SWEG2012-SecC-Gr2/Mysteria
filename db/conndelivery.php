<?php
    $host = 'localhost';
    $db = 'mysteriadb';
    $user ='root';
    $pass ='';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user , $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }
    require_once 'crud2delivery.php';
    $manipdelivery = new manipdelivery($pdo);// new object
?>