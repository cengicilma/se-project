<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require 'ConnectDB.php';

//list all the products in the products table
Flight::route('GET /list-products', function () {
    $db = ConnectDB::getInstance()->getConnection();
    $g = $db->query("SELECT * FROM product");

    while ($row = $g->fetch(PDO::FETCH_ASSOC)){
        $ar[] = $row;
    }
    Flight::json($ar);
});

//add item to cart
Flight::route("POST /order", function () {
    $db = ConnectDB::getInstance()->getConnection();

    $request = Flight::request();
    //get post data
    $name = $request->data->name;
    $price = $request->data->price;
    $quantity = $request->data->quantity;

});

