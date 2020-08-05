<?php
$uid=$_GET['uid'];
include('conctn.php');

 $name = $email = $password='';//extra_var
$errors = array('name' => '', 'email' => '','password' => '');//errorvar
if(isset($_POST['submit']))
{
      //echo "enter into database";
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email =$_POST['email'];
       $address =$_POST['address'];

      $sql = "INSERT INTO customer(uid,cname,email,phone,address) VALUES('$uid','$name','$email','$phone','$address')";
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
            <h4 class="center">Enter Customer details</h4>
            <form class="white" action="" method="POST" style=" filter: drop-shadow(5px 5px 3px black);">
              <label>Name</label>
              <input type="text" name="name" value="">
         <!--     <div class="red-text"><?php //echo $errors['name']; ?></div>-->
</br>

              <label>Email</label>
              <input type="text" name="email" value="" required>
</br>
              <label>Address</label>
              <input type="text" name="address" value="" required>
</br>
              <label>Phone</label>
              <input type="number" name="phone" value="" required>

</br>

              <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
              </div>

              <div class="bottom">
              <h6 class="center"><a href="adminpannel.php?uid=<?php echo $uid; ?>">Back</a>
              </h6>
              </div>
              </style>
            </form>

          </section>
      </main>


    <?php include ('includes/footer.php');?>
  </body>
</html>