<?php 
include('conctn.php');
$cid=$_GET['did'];
$uid=$_GET['uid'];
echo $cid.$uid;
$sql="DELETE from customer where cid='$cid'";
if(mysqli_query($conn,$sql))
	header('location:cust.php?uid='.$uid);
else
	echo "error";
?>