<?php
/**
 * Created by PhpStorm.
 * User: mattias.nording
 * Date: 2017-05-12
 * Time: 16:34
 */
session_start();

define("URL", "http://".$_SERVER['SERVER_NAME']."".dirname($_SERVER['REQUEST_URI']));
require_once 'vendor/autoload.php';
$_SESSION["mid"] = $_POST["mid"];
$_SESSION["pass"] = $_POST["pass"];
$orderData = array();
$orderData['order_lines'] = array();
$totalvalue =0;
for($i =0; $i<count($_POST["artno"]);$i++)
{
    if($_POST["artno"][$i] == "")
    {
        continue;
    }
    $totalvalue += intval($_POST["price"][$i]);
    $vat = intval($_POST["price"][$i]) / 5;
 $orderData['order_lines'][] =
     array(
         "type" => "physical",
         "reference" => "123050",
         "name" => $_POST["artno"][$i],
         "quantity" => 1,
         "total_tax_amount" => $vat,
         "total_amount"=> intval($_POST["price"][$i]),
         "quantity_unit" => "pc",
         "unit_price" => intval($_POST["price"][$i]),
         "tax_rate" => 2500,
     );
}
$merchantUrls = [
    'terms' =>  'http://terms',
    'checkout' =>  URL.'/checkout?klarna_order_id={checkout.order.id}',
    'confirmation' =>  URL.'/confirmation.html.php?klarna_order_id={checkout.order.id}',
    'push' =>  URL.'/push.php?klarna_order_id={checkout.order.id}'
];
$orderData["billing_address"] =
    array(
        "given_name" => "Testperson-se",
        "family_name" => "Approved",
        "email" => "checkout-se@testdrive.klarna.com",
        "street_address" =>"Stårgatan 1",
        "postal_code" => "12345",
        "city" =>"Ankeborg",
        "phone" => "0765260000"


);
$orderData['purchase_country'] = 'se';
$orderData['purchase_currency'] = 'sek';
$orderData['locale'] = 'sv-se';
$orderData["order_amount"] = $totalvalue;
$orderData["order_tax_amount"] = $totalvalue / 5;
$orderData['merchant_urls'] = $merchantUrls;
$connector = \Klarna\Rest\Transport\Connector::create(
    $_SESSION["mid"],
    $_SESSION["pass"],
    \Klarna\Rest\Transport\ConnectorInterface::EU_TEST_BASE_URL
);

$checkout = new \Klarna\Rest\Checkout\Order($connector);
$checkout->create($orderData);
$checkout->fetch();
$snippet= $checkout['html_snippet']
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
