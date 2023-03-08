<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
<link rel="stylesheet" href="./ecommerce.css">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet"> 
  <style>
   * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
header {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  height: 60px;
  width: 100%;
  background: black;
}
.heading ul {
  display: flex;
}
.logo a {
  color: white;
  transition-duration: 1s;
  font-weight: 800;
}
.logo a:hover {
  color: rgb(240, 197, 6);
  transition-duration: 1s;
}
.heading ul li {
  list-style: none;
}
.heading ul li a {
  margin: 5px;
  text-decoration: none;
  color: black;
  font-weight: 500;
  position: relative;
  color: white;
  margin: 2px 14px;
  font-size: 18px;
  transition-duration: 1s;
}
.heading ul li a:active {
  color: red;
}
.heading ul li a:hover {
  color: rgb(243, 168, 7);
  transition-duration: 1s;
}

.heading ul li a::before {
  content: "";
  height: 2px;
  width: 0px;
  position: absolute;
  left: 0;
  bottom: 0;
  background-color: white;
  transition-duration: 1s;
}
.heading ul li a:hover::before {
  width: 100%;
  transition-duration: 1s;
  background-color: rgb(243, 168, 7);
}
#input {
  height: 30px;
  width: 300px;
  text-decoration: none;
  border: 0px;
  padding: 5px;
}
.logo a {
  color: white;
  font-size: 35px;
  font-weight: 500;
  text-decoration: none;
}
ion-icon {
  width: 30px;
  height: 30px;
  background-color: white;
  color: black;
}
ion-icon:hover {
  cursor: pointer;
}
.search a {
  display: flex;
}
header a ion-icon {
  position: relative;
  right: 3px;
}

.img-slider img {
  height: 720px;
  width: 1200px;
}
@keyframes slide {
  0% {
    left: 0px;
  }
  15% {
    left: 0px;
  }
  20% {
    left: -1080px;
  }
  32% {
    left: -1080px;
  }
  35% {
    left: -2160px;
  }
  47% {
    left: -2160px;
  }
  50% {
    left: -3240px;
  }
  63% {
    left: -3240px;
  }
  66% {
    left: -4320px;
  }
  79% {
    left: -4320px;
  }
  82% {
    left: -5400px;
  }
  100% {
    left: 0px;
  }
}
.img-slider {
  display: flex;
  float: left;
  position: relative;
  width: 1920px;
  height: 720px;
  animation-name: slide;
  animation-duration: 10s;
  animation-iteration-count: infinite;
  transition-duration: 2s;
}

.heading1 {
  opacity: 0;
}
.search {
  display: flex;
  position: relative;
}
.section1 {
  width: 100%;
  overflow: hidden;

  justify-content: center;
  align-items: center;
  margin: 0px auto;
}
.div1{
    width: 33%;
    float: left;
    border:10px rgb(240, 197, 6);
   position: relative;
}
.div2{
    width: 33%;
    float: left;
    position: relative;
}
.div3{
    width: 33%;
    float: left;
    position: relative;
}
.table{
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-align: center;
            font-size: large;
            text-transform: capitalize;
}
</style>
</head>

<body>
  <header>
    <div class="logo"><a href="#">ABC ONLINE SHOPPING</a></div>
    <div class="menu">
      <a href="#">
        <ion-icon name="close" class="close"></ion-icon>
      </a>

      
    </div>
    <div class="search">

      <a href=""><input type="text" placeholder="search products" id="input">
        <ion-icon class="s" name="search"></ion-icon>
      </a>
    </div>
    <div class="heading">
    <ul>
        <li><a href="new.php" class="under">HOME</a></li>
        <li><a href="temp.php" class="under">VIEW CART</a></li>
        <li><a href="logout.php" class="under">LOG OUT</a></li>
        
      </ul>
    </div>
    <div class="heading1">
      <ion-icon name="menu" class="ham"></ion-icon>
    </div>
  </header>
  <section>
    <div class="section">
      <div class="section1">
        <div class="img-slider">
          <img src="https://images.pexels.com/photos/6347888/pexels-photo-6347888.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img" width="1080">
          <img src="https://images.pexels.com/photos/3962294/pexels-photo-3962294.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img" width="1080">
          <img src="https://images.pexels.com/photos/2292953/pexels-photo-2292953.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="" class="img" width="1080">
          <img src="https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img" width="1080">
          <img src="https://images.pexels.com/photos/1598505/pexels-photo-1598505.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img" >
        </div>
      </div>
      </div>
    <?php 
       
        include_once('proddbconfig.php');
        $_SESSION["name"]=array();
        $_SESSION["index"]=array();
        $query="SELECT * FROM `product`;";
        $result=mysqli_query($conn,$query);
        $arr=array();
        $pricearr=array();
        $qarr=array();
        $c=0;
       function f(){
                 
       }
        while($r=mysqli_fetch_assoc($result)){
             $a=$r["name"];
              $b=$r["price"];
              $c=$r["quantity"];
              $d=$r["filename"];
             array_push($_SESSION["name"],$a);
             
    $c++;
    if($c<=3){
    echo"<div class='div1'>";
       echo "<tr>";
           echo"<td>";
            echo"<table class='table'>";
            ?>
			<img src="./image/<?php echo $d; ?>"height="400" width="400">
      <?php
            echo"<tr><td>$a</td></tr>";
            echo"<tr><td>Price:$b INR</td></tr>";
            echo"<tr><td><a href='intermediate.php?link=$a&price=$b'>See More</a></td></tr>";
            echo"</table></td>";
            echo"</tr>";
            echo"</table>";
          echo "</div>";  
            
    }
    else if($c>3&&$c<=6){
        echo"<div class='div2'>";
       
            echo"<table class='table'>";
            ?>
			<img src="./image/<?php echo $d; ?>"height="400" width="400">
      <?php
            echo"<tr><td>$a</td></tr>";
            echo"<tr><td>Price:$b INR</td></tr>";
            echo"<tr><td><a href='intermediate.php?link=$a&price=$b'>See More</a></td></tr>";
            echo"</table></td>";
            echo"</tr>";
            echo"</table>";
          echo "</div>";  
            
              
      
    }
    else{
        echo"<div class='div3'>";
       
            echo"<table class='table'>";
            ?>
			<img src="./image/<?php echo $d; ?> " width="400" height="400">
      <?php
            echo"<tr><td>$a</td></tr>";
            echo"<tr><td>Price:$b INR</td></tr>";
            echo"<tr><td><a href='intermediate.php?link=$a&price=$b'>See More</a></td></tr>";
            echo"</table></td>";
            echo"</tr>";
            echo"</table>";
          echo "</div>";  
    }
}
   
           ?>
</body>
</html>