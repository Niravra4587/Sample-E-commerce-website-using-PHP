<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    body{padding-top:20px;}
</style>
</head>
<body>
<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Enter Product Details</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Enter Product Name" name="name" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Enter no of quantity" name="quantity" type="text" value="">
			    		</div>
                        <div class="form-group">
			    			<input class="form-control" placeholder="Enter price" name="price" type="text" value="">
			    		</div>
						<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Add" name="add">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php
  include_once('proddbconfig.php');
  error_reporting(0);
  if(!empty($_POST["add"])){
         if(!empty($_POST["price"])&&!empty($_POST["name"])&&!empty($_POST["quantity"])){
            $a=$_POST["name"];
            $b=$_POST["quantity"];
            $c=$_POST["price"];
			$filename = $_FILES["uploadfile"]["name"];
	        $tempname = $_FILES["uploadfile"]["tmp_name"];
	        $folder = "./image/" . $filename;
            $query="INSERT INTO `product`(`name`,`quantity`,`price`,`filename`) VALUES('$a','$b','$c','$filename');";
            $result=mysqli_query($conn,$query);
			
            if (move_uploaded_file($tempname, $folder)) {
				echo "<h3> Image uploaded successfully!</h3>";
			} else {
				echo "<h3> Failed to upload image!</h3>";
			}
	
			if($result){
				header('location:admin.php');
			}
         }    
  }

?>
</body>
</html>