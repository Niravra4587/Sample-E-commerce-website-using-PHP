<?php
session_start();

$a=$_SESSION["name"];
$price=$_SESSION["price"];
?>

<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .image{
            float:center;
            padding-right: 50px;
            padding-bottom: 50px;
        }
        .p{
            text-decoration-color: red;
        }
        .center{
            text-align: center;
            background-color:whitesmoke;
        }
        .button{
            background-color: #4CAF50; /* Green */
  border-radius: 8px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
        }
        .name{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-align: center;
            font-size: large;
            text-transform: capitalize;
        }
    </style>
    <script> 
function f(){
    window.location.replace("new.php");
}</script>
</head>
<div class="center">
    <?php
    include_once('proddbconfig.php');
    $query="SELECT * FROM `product` WHERE name='$a';";
    $r=mysqli_query($conn,$query);
    while($result=mysqli_fetch_assoc($r)){
           $d=$result["filename"];
    ?>
<div class="image"><img src="./image/<?php echo $d; ?>"height="350" width="350"></div>
<?php
    }
    ?>
<div class="rest">
<div id="product" class="name"><?php echo$_SESSION["name"];?></div>
<span class="name"><div id="Price" class="name">Price:-<?php echo $_SESSION["price"]; ?>INR</div></span>
<div class="name"></div>
<form method="post" action="<?php echo$_SERVER["PHP_SELF"]?>">

<div class="name">Quantity<input type="number" name="quantity" value=1></div>
<input type="submit" name="cart" class="btn btn-default" value="Add to cart" id="cart">

</form>
<button id='rzp-button1'class="btn btn-default" method='post'><span class="glyphicon glyphicon-shopping-cart"></span>Pay></button><br>
</div><br>

<button type="button" class="btn btn-default" onclick="f()">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button>
<?php 

 
include_once('cart.php');
if(isset($_POST["cart"])){
echo "<p class='name'>This Item Is Added To Cart</p>";
$a1=$_SESSION["name"];

$q=$_POST["quantity"];
if($q>4){
    ?>
    <script>alert('You cannot Select More than 3 items in cart');
    <?php
}
else{
$price=$price*100*$q;
$query="INSERT INTO `cart`(`PRODUCTN`,`PRICE`,`QUANTITY`,`filename`)VALUES('$a','$price','$q','$d');";
$result=mysqli_query($con,$query);
if(!$result){
    echo' Not working';
 }

}
}

?>
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

var options = {
    "key": "rzp_test_nbCRQQCIAP7e3j", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo$price*100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "E-SHOPP",
    "image": "https://example.com/your_logo",
    //"order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "Niravra",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

</script>
</div>
