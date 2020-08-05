<?php
$uid=$_GET['uid'];
include('conctn.php');
$name = $email = $password='';//extra_var
$errors = array('name' => '', 'email' => '','password' => '');//errorvar
if(isset($_POST['update']))
{

      $phone = $_POST['phone'];
      $email  = $_POST['email'];
      $address =$_POST['address'];
      //echo $uid;
      $id = "select cid from customer where cid=$array[0]";
      $res=mysqli_query($conn,$id);
      $again=mysqli_fetch_row($res);
      $cid = $_GET["cid"];
      $sql="CALL get_update('$cid','$phone','$email','$address')";
      if(mysqli_query($conn, $sql)){
      header('Location:cust.php?uid='.$uid);
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
            <h4 class="center">New Data</h4>
            <form class="white" action="" method="POST" style=" filter: drop-shadow(5px 5px 3px black);">
              <label>phone</label>
              <input type="number" name="phone" value="" required>
         <!--     <div class="red-text"><?php //echo $errors['name']; ?></div>-->
</br>

              <label>email</label>
              <input type="text" name="email" value="" required>
</br>
              <label>address</label>
              <input type="text" name="address" value="" required>
</br>

              <div class="center">
                <input type="submit" name="update" value="update" class="btn brand z-depth-0">
              </div>

              <div class="bottom">
              <h6 class="center"><a href="cust.php?uid='".$uid>Back</a>
              </h6>
              </div>
              </style>
            </form>

          </section>
      </main>


    <?php include ('includes/footer.php');?>
  </body>
</html>