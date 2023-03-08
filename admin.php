<?php
session_start();
 include_once('adminconfig.php');
 $query="SELECT * FROM `admin`;";
 $result=mysqli_query($c,$query);
 while($run=mysqli_fetch_assoc($result)){
	$name=$run["name"];
	$email=$run["email"];
 }
?>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
	.table{
		text-align:left;
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		font-size: larger;
	}
</style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				ABC ONLINE SHOPPING Admin Page
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown ">
					<button class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<li class=""><?php echo $name;?>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="addnewproduct.php">Add new product</a></li>
				<li><a href="#">Increase the product quantity</a></li>
				<li><a href="#">View All Current Users</a></li>
				<li><a href="new.php">View Home Page</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
					List of all Curent Products
                    <?php 
					 include_once('proddbconfig.php');
					 $query="SELECT * FROM product;";
                     $result=mysqli_query($conn,$query);
					 echo"<table class='table'>";
	 echo "<tr> <td>Product Name </td> <td> Product Quantity </td> </tr>";
         while($run=mysqli_fetch_assoc($result)){
			$n=$run["name"];
			$q=$run["quantity"];
	 
	 echo "<tr> <td>$n</td> <td> $q </td> </tr>";
     
 }
 echo"</table>";

?>
</div>
     
				<div class="panel-body">
					List of all Registered Users
                    <?php 
					 include_once('config.php');
					 $query="SELECT * FROM users;";
                     $result=mysqli_query($conn,$query);
					 echo"<table class='table'>";
	 echo "<tr> <td>User Name </td> <td> User Email </td> </tr>";
         while($run=mysqli_fetch_assoc($result)){
			$n=$run["USERNAME"];
			$q=$run["e-mail"];
	 
	 echo "<tr> <td>$n</td> <td> $q </td> </tr>";
     
 }
 echo"</table>";

					?>
                </div>
				<div class="panel-body">
					Current Users
                    <?php 
					
					 
					
					 echo"<table class='table'>";
	 echo "<tr> <td>User Name </td> <td> User Email </td> </tr>";
         
			
			if(isset($_SESSION["uname"])&&isset($_SESSION["uemail"])){
				$uname=$_SESSION["uname"];
			$uemail=$_SESSION["uemail"];
			echo "<tr> <td>$uname</td> <td> $uemail</td> </tr>";
			}else{
				echo "<tr> <td>No current users</td> <td></td> </tr>";
			}
 
 echo"</table>";

					?>
                </div>
            </div>
		</div>
	</div>
</body>