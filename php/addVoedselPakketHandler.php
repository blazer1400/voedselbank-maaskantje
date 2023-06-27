<?php

session_start();

require('dbConnection.php');

class Product {
    public $product_id;
    public $amount;

}

$amount = 0;
$products = array();
foreach($_POST as $key => $item) {
    if (strpos($key, 'product') === 0 && $item != null) {
        $amount++;
        $newProduct = new Product();
        $newProduct->product_id = $item;
        $newProduct->amount = $_POST['amount_' . explode('_', $key)[1]];
        $products[] = $newProduct;
    }
}

$query = $dbConnection->query("INSERT INTO voedselpakketen (`Datum sammenstelling`, `Aantal producten`, `id_klant`)"
    . " VALUES ('" . date('Y-m-d') . "', '" . $amount . "', '" . $_POST['id_klant'] . "')");
if ($query) {
    $id_query = $dbConnection->query('SELECT LAST_INSERT_ID()');
    $voedselpakket_id = implode('', $id_query->fetch_assoc());
    foreach($products as $product) {
        for ($i = 0; $i < $product->amount; $i++) {
            $product_query = $dbConnection->query("INSERT INTO voedselpakketen_has_productvoorraad (`voedselpakketen_Pakketnummer`, `productvoorraad_EAN Nummer`)"
                . " VALUES ('" . $voedselpakket_id . "', '" . $product->product_id . "')");
            if (!$product_query) {
                die($dbConnection->error);
            }
        }
    }

    $_SESSION['message'] = 'Voedselpakket aangemaakt';

    header('location: overzichtVoedselPakket.php '); // TODO zet hier nog ff de file van het voedselpakket overzicht
} else {
    die($dbConnection->error);
}

