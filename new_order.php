<?php
$uid=$_GET['uid'];
include('conctn.php');
$name = $email = $password='';//extra_var
$errors = array('name' => '', 'email' => '','password' => '');//errorvar
if(isset($_POST['submit']))
{
/*  if(empty($_POST['cname'])){
    $errors['cname'] = 'A name is required <br />';
  } else{
    $name = $_POST['cname'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
      $errors['name'] =  'name must be letters and spaces only<br/>';
    }
  }

  if(empty($_POST['email'])){
    $errors['email'] = 'A phone no is required <br />';
  }

  if(empty($_POST['phone'])){
    $errors['phone'] = 'A Phone Number is required <br />';
  }
  if(array_filter($errors))
  {
      echo "terminted";
    }
    else{*/
      //echo "enter into database";
      $cname = $_POST['cname'];
      $pname = $_POST['p_name'];
      $amount=$_POST['p_amt'];
      $o_date=$_POST['o_date'];
      //echo $uid;
      $id = "select cid from customer where cname=$cname";
      $res=mysqli_query($conn,$id);
      $again=mysqli_fetch_row($res);
      $pid = "select p_id from stocks where p_name=$p_name";
      $res_1=mysqli_query($conn,$id);
      $again_1=mysqli_fetch_row($res);
      $sql="INSERT INTO order(o_date,id,p_id) VALUES('$o_date','$again[0]','$again_1[0]');
            INSERT INTO payment(p_id,pay_amt,pay_date,cid) VALUES('$p_id','$amount','$o_date','$id')";
      if(mysqli_query($conn, $sql)){
      header('Location:adminpannel.php?uid='.$uid);
      echo "done";
      } else {
        echo 'query error: '. mysqli_error($conn);
      }
    
}
  ?>
 <!DOCTYPE html>
<html>
    <body background="img2.jpg">
      <nav class="white z-depth-0">
        <div class="container">
          <a href="adminpannel.php" class="brand-logo brand-text">Automotive Inventory</a>
          <ul id="nav-mobile" class="right hide-on-small-and-down">
        
          </ul>
        </div>
      </nav>
<?php include('includes/header1.php');?>
      <main style=''>
        <section class="container charcoal-text" style='
                                  width:100%;
                                  height:100%;'>
            <h4 class="center">New order</h4>
            <form class="white" action="" method="POST" style=" filter: drop-shadow(5px 5px 3px black);">
              <label>customer Name</label>
              <input type="text" name="cname" value="" required>
         <!--     <div class="red-text"><?php //echo $errors['name']; ?></div>-->
</br>

              <label>product name</label>
              <input type="text" name="p_name" value="" required>
</br>
              <label>product amount</label>
              <input type="number" name="p_amt" value="" required>
</br>         
              <label>order Date</label>
              <input type="Date" name="o_date" value="" required>
</br>

              <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
              </div>

              <div class="bottom">
              <h6 class="center"><a href="adminpannel.php?uid='".$uid>Back</a>
              </h6>
              </div>
              </style>
            </form>

          </section>
      </main>


    <?php include ('includes/footer.php');?>
  </body>
</html>