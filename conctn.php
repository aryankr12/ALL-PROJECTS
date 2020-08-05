<?php
$conn = mysqli_connect('localhost', 'root', '', 'Inventory');

if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();
}
else {
//echo "connected";
}
?>
