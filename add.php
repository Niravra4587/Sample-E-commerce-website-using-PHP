<?php
include_once("config.php");
session_start();
?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
</style>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <h1>ABC SHOPPING WEBSITE</h1>
            <h2>New User<br> Registration Page</h2>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" placeholder="User Name" name="name">
                  </div>
                  <div class="form-group">
                     <label>E-mail</label>
                     <input type="text" class="form-control" placeholder="E-mail" name="email">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <button type="submit" class="btn btn-secondary" name="register">Register</button>
               </form>
            </div>
         </div>
      </div>

<?php
if(!empty($_POST["name"])&&!empty($_POST["password"]))
  {
    $a=$_POST["name"];
    $b=$_POST["password"];
    $c=$_POST["email"];
    if(filter_var($c,FILTER_VALIDATE_EMAIL)&&preg_match("/^[a-zA-Z-' ]*$/",$a)){
    
    try{
      $query="INSERT INTO `users`(`USERNAME`, `PASSWORD`,`e-mail`) VALUES ('$a','$b','$c')";

    $result=mysqli_query($conn,$query);
      $_SESSION["uname"]=$a;
      $_SESSION["uemail"]=$b;
        header("location:new.php");
    }
    catch(Exception $e){
        echo 'This password is already used';
    }
  }
  else{
    echo 'The format doesnt match';
  }
  }
?>
</body>
</html>
