<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  function f(){
    window.location.replace("new.php");
  }
  function fxn(){
    window.location.replace("del.php");
  }
</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    
          <?php
            include_once('cart.php');
            $q="SELECT * FROM `cart`";
            $r=mysqli_query($con,$q);
            $s=0;
            if(mysqli_num_rows($r)>0){
               while($row=mysqli_fetch_assoc($r)){
                  $a=$row["PRODUCTN"];
                  $d=$row["filename"];
                  $c=$row["QUANTITY"];
                  $e=$row["PRICE"];
                  echo"<tr><td class='col-sm-8 col-md-6'><div class='media'>";?>
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="./image/<?php echo$d; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo$a; ?></a></h4>
                                
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo$c; ?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo$e/100;?></strong></td>
                      
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger" onclick="fxn()">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                        </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong><?php echo$e/100;?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>16.00</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <?php $s+=$e/100+16; ?>
                        <td class="text-right"><h3><strong><?php echo$e/100+16;?></strong></h3></td>
                    </tr>
                  <?php
                  
            }
           
            }
        
            ?>
            <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Grand Total</h3></td>
                        <td class="text-right"><h3><strong><?php if(isset($s))echo$s;?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default" onclick="f()">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success" id="rzp-button1" method="post" onclick="fxn()">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

var options = {
    "key": "rzp_test_nbCRQQCIAP7e3j", 
    "amount": "<?php echo$s*100;?>",
    "currency": "INR",
    "name": "E-SHOPP",
    "image": "https://example.com/your_logo",
    
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
        fxn();
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
    </body>
    </html>