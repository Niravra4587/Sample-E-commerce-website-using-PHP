<?php
session_start();
$a=$_GET["link"];
$price=$_GET["price"];
$_SESSION["name"]=$a;
$_SESSION["price"]=$price;
header('location:product1.php');
?>