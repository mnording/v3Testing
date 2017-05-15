<?php
/**
 * Created by PhpStorm.
 * User: mattias.nording
 * Date: 2017-05-12
 * Time: 11:17
 */
session_start();
if(isset($_SESSION["mid"]) == false)
{
    $_SESSION["mid"] = "";
}
if(isset($_SESSION["pass"]) == false)
{
    $_SESSION["pass"] = "";
}
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
<form action="checkout.html.php" method="post">
    <div class="row">
    <div class="input-field col s3">
        <input placeholder="itemname" name="name[]" type="text" class="validate">
        <label for="name">name</label>
    </div>
    <div class="input-field col s3">
        <input placeholder="artno" name="artno[]" type="text" class="validate">
        <label for="first_name">artno</label>
    </div>
    <div class="input-field col s3">
        <input placeholder="price" name="price[]" type="text" class="validate">
        <label for="first_name">price</label>
    </div>
</div>
    <div class="row">
        <div class="input-field col s3">
            <input placeholder="itemname" name="name[]" type="text" class="validate">
            <label for="name">name</label>
        </div>
        <div class="input-field col s3">
            <input placeholder="artno" name="artno[]" type="text" class="validate">
            <label for="first_name">artno</label>
        </div>
        <div class="input-field col s3">
            <input placeholder="price" name="price[]" type="text" class="validate">
            <label for="first_name">price</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s3">
            <input placeholder="itemname" name="name[]" type="text" class="validate">
            <label for="name">name</label>
        </div>
        <div class="input-field col s3">
            <input placeholder="artno" name="artno[]" type="text" class="validate">
            <label for="first_name">artno</label>
        </div>
        <div class="input-field col s3">
            <input placeholder="price" name="price[]" type="text" class="validate">
            <label for="first_name">price</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s2">
            <input placeholder="KXXXXX" name="mid" value="<?php echo $_SESSION["mid"] ?>" type="text" class="validate">
            <label for="first_name">API MID</label>
        </div>
        <div class="input-field col s3">
            <input placeholder="" name="pass" type="text" value="<?php echo $_SESSION["pass"]?>" class="validate">
            <label for="first_name">API Pass</label>

        </div>
        <div class="input-field col s5">
            <button class="waves-effect waves-light btn">Create Checkout</button>
            </div>
    </div>
</form>
</div>
<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
