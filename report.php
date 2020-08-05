<?php 
  $uid=$_GET['uid'];
  include('conctn.php');
   
   $q="SELECT min(P_id),max(P_id) from stocks"; 
   $res=mysqli_query($conn,$q);
   $r=mysqli_fetch_row($res);
   $i=0;$j=0;
   $quant=0;$pname="gf";
   $query= "SELECT p_id, count(p_id) from orders group by p_id";
   $res_1=mysqli_query($conn,$query);
   $r_1=mysqli_fetch_assoc($res_1);
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
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Date & Time</th>

          </tr>
        </thead>
   <?php for ($i=$r[0];$i<=$r[1];$i++) { ?>
        <?php 
            
            if($i==$r_1["p_id"]){
              $s="CALL `get_new_proc`({$i},{$r_1["count(p_id)"]},@quant,@pname)";
              mysqli_query($conn,$s);
              $sql= "SELECT @quant AS `quant`, @pname AS `pname`";
              $res2=mysqli_query($conn,$sql);
              $r2=mysqli_fetch_row($res2);
               mysqli_free_result($res2);
               $r_1=mysqli_fetch_assoc($res_1);
            }
            else{
             $g="CALL `get_new_proc`({$i},{$j},@quant,@pname)";
              mysqli_query($conn,$g);
              $sqli= "SELECT @quant AS `quant`, @pname AS `pname`";
              $res2=mysqli_query($conn,$sqli);
              $r2=mysqli_fetch_row($res2);
              mysqli_free_result($res2);
            }
        ?>
        <tbody>
          <tr>
            <!--<td><?php echo $i ?></td>-->
            <td><?php echo $r2[1] ?></td>
            <td><?php echo $r2[0] ?></td>
            <td><?php echo date("Y-m-d") ?></td>
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