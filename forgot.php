<body>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
E-MAIL:-<input type="text" name="email"><br>
<input type="submit">
</form>
<?php
include_once('config.php');
if(!empty($_POST["email"])&&!empty($_POST["password"])){
    $em=$_POST["email"];
    $query="SELECT `PASSWORD` FROM `users` WHERE `email`='$pass'";
    $result=mysqli_query($conn,$query);
    if($result){
        while($message=mysqli_fetch_assoc($result)){
             $to=$email;
             $subject="Forgot Password";
             $msg="Your Password is :- $message";
             $mail=mail($to,$subject,$msg);
             if(!$mail){
                echo 'Mail Not Sent';
             }
        }
    }
    else{
        echo 'Invalid E-Mail';
    }
}
?>
</body>