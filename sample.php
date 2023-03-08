<?php
session_start();
include("config.php");
?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    function onc(){
        window.location.href="add.php";
    }
</script>

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
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
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
                  <button type="submit" class="btn btn-black" name="login">Login</button>
                  <button type="button" class="btn btn-secondary" name="register" onclick="onc()">Register</button>
               </form>
            </div>
         </div>
      </div>
</body>
<?php


if(!empty($_POST["name"])&&!empty($_POST["password"])&&!empty($_POST["email"]))
  {
    $a=$_POST["name"];
    $b=$_POST["password"];
    $c=$_POST["email"];
    
    if(similar_text($a,"adm1001")==0){
            header("location:admin_homepage");
    }
    $query="SELECT * FROM `users` WHERE `PASSWORD`='$b';";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
    
        $_SESSION["uname"]=$a;
        $_SESSION["uemail"]=$c;
        header("location:new.php");
    }
    else{
        
        echo 'NOT A REGISTERED USER';
    }
  }

?>
</html>