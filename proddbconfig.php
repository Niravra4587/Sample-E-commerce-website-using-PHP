<?php
 $username='root';
 $password='';
 $sever='localhost';
 $dbname='product';
 $conn=mysqli_connect($sever,$username,$password,$dbname);
 if(!$conn)
 {
    echo'not connected';
 }
 ?>