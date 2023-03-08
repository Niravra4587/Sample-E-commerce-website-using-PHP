<?php
include_once('cart.php');
$q1="DELETE FROM `cart` WHERE 1;";
$exec=mysqli_query($con,$q1);
header('location:new.php');
?>