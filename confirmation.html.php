<?php
/**
 * Created by PhpStorm.
 * User: mattias.nording
 * Date: 2017-05-12
 * Time: 17:05
 */
session_start();
define("URL", "http://".$_SERVER['SERVER_NAME']."/v3test");
require_once 'vendor/autoload.php';
$klarnaID = $_GET["klarna_order_id"];
$connector = \Klarna\Rest\Transport\Connector::create(
    $_SESSION["mid"],
    $_SESSION["pass"],
    \Klarna\Rest\Transport\ConnectorInterface::EU_TEST_BASE_URL
);

$checkout = new \Klarna\Rest\Checkout\Order($connector, $klarnaID);

$checkout->fetch();
$snippet= $checkout['html_snippet'];

$order = new \Klarna\Rest\OrderManagement\Order(
    $connector,
    $klarnaID
);
$order->fetch();
$order->acknowledge();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s12">
            <? echo $snippet ?>
        </div>
    </div>
</div>
</body>

