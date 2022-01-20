<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');
require './vendor/autoload.php';

/*
Username: 4Z0PvflNWl
Database name: 4Z0PvflNWl
Password: wTq9yrRwVU
Server: remotemysql.com
Port: 3306
*/

Flight::register('db', 'PDO', array('mysql:host=remotemysql.com;dbname=4Z0PvflNWl','4Z0PvflNWl','wTq9yrRwVU'));

Flight::route('GET /users', function (){
    $users = Flight::db()->query('SELECT * FROM user', PDO::FETCH_ASSOC)->fetchAll();
    Flight::json($users);
});

Flight::start();


