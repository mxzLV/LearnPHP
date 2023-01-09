<?php
const DATABASE_SERVER = 'localhost';
const DATABASE_USER = 'root';
const DATABASE_PASSWORD = '';
const DATABASE_NAME = 'phpapp';
$connection = null;
try{
    $connection =  new PDO(
        "mysql:host=".DATABASE_SERVER.";dbname=".DATABASE_NAME,
        DATABASE_USER, DATABASE_PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

}catch (PDOException $e){
    echo "Connection failed".$e->getMessage();
    $connection = null;
}
