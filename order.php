<?php 
$uid=$_GET['uid'];
include('conctn.php');

$sql="SELECT cname,phone,S.p_name,pay_amt,pay_date
from customer C,orders O,stocks S,payment P
where C.cid=O.cid
and O.o_id=P.o_id
and O.p_id=S.p_id
and C.uid in (SELECT uid from customer where uid=$uid)";

$res=mysqli_query($conn,$sql);
$array=mysqli_fetch_all($res,MYSQLI_ASSOC);

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
              <th>PRoduct Name</th>
              <th>PRoduct Amount</th>
              <th>Ordered Date</th>
          </tr>
        </thead>
<?php foreach ($array as $ind) { ?>
        <tbody>
          <tr>
            <td><?php echo $ind['cname'] ?></td>
            <td><?php echo $ind['phone'] ?></td>
            <td><?php echo $ind['p_name'] ?></td>
            <td><?php echo $ind['pay_amt'] ?></td>
            <td><?php echo $ind['pay_date'] ?></td>
          </tr>

        </tbody>
        <?php } ?>

      </table>
      </div>

      <div class="center-align" style="margin-top: 8px;"><a class="waves-effect waves-light btn-small " style="text-decoration: none;" href="adminpannel.php?uid=<?php echo $uid;?>">BACK</a></div>


<?php
include('includes/footer.php');
?>

</body>
</html>