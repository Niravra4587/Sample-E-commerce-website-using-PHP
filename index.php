<?php
include_once('proddbconfig.php');
$query='SELECT * FROM `product`;';
$result=mysqli_query($conn,$query);
while($r=mysqli_fetch_assoc($result)){
    ?>
    <img src="./image/<?php echo $r['filename']; ?>">

<?php
}
?>