<?php
$username='root';
$password='';
$sever='localhost';
$dbname='admin';
$c=mysqli_connect($sever,$username,$password,$dbname);
if(!$c)
{
   echo'not connected';
}
?>