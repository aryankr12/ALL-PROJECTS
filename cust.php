<?php 
$uid=$_GET['uid'];

include('conctn.php');
$sql="select  cid ,cname,email,phone,address
from customer where uid=$uid";
$res=mysqli_query($conn,$sql);
$array=mysqli_fetch_all($res,MYSQLI_ASSOC);

$que="SELECT  cname,email,phone,address,dor
from del_cust where uid=$uid";
$result=mysqli_query($conn,$que);
$arr=mysqli_fetch_all($result,MYSQLI_ASSOC);



 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
<?php
include('includes/header1.php'); ?>

 <div class="container" style="border: solid grey 1px;">
<table class="highlight" >  <thead>
          <tr>
              <th>Customer Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Address</th>
              <th>Action</th>
             
          </tr>
        </thead>
<?php foreach ($array as $ind) { ?>
        <tbody>
          <tr>
            <td><?php echo $ind['cname'] ?></td>
            <td><?php echo $ind['phone'] ?></td>
            <td><?php echo $ind['email'] ?></td>
            <td><?php echo $ind['address'] ?></td>
            <td><a href="delete.php?did=<?php echo $ind['cid']?>&uid=<?php echo $uid; ?>" style="text-decoration: none;" >DELETE</a></td>
            <td><a href="update.php?cid=<?php echo $ind['cid']?>&uid=<?php echo $uid; ?>" style="text-decoration: none;" >UPDATE</a></td>


          </tr>

        </tbody>
        <?php } ?>

      </table>
      </div>

      <div class="container" style="border: solid grey 1px;margin-top: 30px;">
        <h2 class="center-align" >Deleted Customers</h2>
<table class="highlight" >  <thead>
          <tr>
              <th>Customer Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Address</th>
              <th>DOR</th>
             
          </tr>
        </thead>
<?php foreach ($arr as $in) { ?>
        <tbody>
          <tr>
            <td><?php echo $in['cname'] ?></td>
            <td><?php echo $in['phone'] ?></td>
            <td><?php echo $in['email'] ?></td>
            <td><?php echo $in['address'] ?></td>
            <td><?php echo $in['dor'] ?></td>


          </tr>

        </tbody>
        <?php } ?>

      </table>
      </div>

      <div class="center-align" style="margin-top: 8px;"><a class="waves-effect waves-light btn-small " style="text-decoration: none;" href="adminpannel.php?uid=".$uid>BACK</a></div>


<?php
include('includes/footer.php');
?>

</body>
</html>