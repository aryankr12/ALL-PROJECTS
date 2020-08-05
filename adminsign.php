<?php
include('conctn.php');

 $name = $email = $password='';//extra_var
$errors = array('name' => '', 'email' => '','password' => '');//errorvar
if(isset($_POST['submit']))
{
	if(empty($_POST['name'])){
    $errors['name'] = 'A name is required <br />';
  } else{
    $name = $_POST['name'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
      $errors['name'] =  'name must be letters and spaces only<br/>';
    }
  }

	if(empty($_POST['email'])){
    $errors['email'] = 'A phone no is required <br />';
  }

	if(empty($_POST['password'])){
    $errors['password'] = 'A password is required <br />';
  }
	if(array_filter($errors))
  {
			echo "terminted";
		}
		else{
			//echo "enter into database";
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			//$phone = mysqli_real_escape_string($conn, $_POST['phone']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$sql = "INSERT INTO user(user_name,email,password) VALUES('$name','$email','$password')";
			if(mysqli_query($conn, $sql)){
			header('Location:custlogin.php');
			echo "done";
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
}
	?>
 <!DOCTYPE html>
<html lang="en" dir="ltr" style='
                                    margin: 0;
                                    height: 100%;
                                '>
    <body  backgroung= img.jpg class="grey lighten-4" style='
                                            margin: 0;
                                            height: 100%;
                                        '>
      
      
      <nav class="white z-depth-0">
        <div class="container">
          <a href="adminlogin.php" class="brand-logo brand-text">Automotive Inventory</a>
          <ul id="nav-mobile" class="right hide-on-small-and-down">
        
          </ul>
        </div>
      </nav>
<?php include 'header.php';  ?>
      <main style='		width:100%;	height:100%;'>
        <section class="container grey-text" style='
        													width:100%;
        													height:100%;'>
        		<h4 class="center">Enter your details</h4>
        		<form class="white" action="" method="POST" style="	filter: drop-shadow(5px 5px 3px black);">
              <label>Name</label>
              <input type="text" name="name" value="">
        			<div class="red-text"><?php echo $errors['name']; ?></div>


        			<label>email</label>
        			<input type="text" name="email" value="" required>
        			<div class="red-text"><?php echo $errors['email']; ?></div>



        			<label>password</label>
        			<input type="password" name="password" value="">
        			<div class="red-text"><?php echo $errors['password']; ?></div>


        			<div class="center">
        				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        			</div>

              <div class="bottom">
              <h6 class="center">already have an account? <a href="adminlogin.php">Login</a>
              </h6>
              </div>


              <style>
                .btn:hover{
                  filter: drop-shadow(3px 3px 2px black);
                  transform:scale(1.1);
                }
              </style>
        		</form>
            <div class="cover" style="padding:0;
                                  		margin-top:2vh;
                                  		height:50vh;
                                      ">
        				<img class="dota1" src="1.svg" alt="" style=' position: absolute;
                                                              top:20vh;
                                                              right:40%;
                                                              padding:0 ;
                                                              transform: scale(0.4);' />
        		</div>


        	</section>
      </main>


    <?php include 'footer.php';?>
  </body>
</html>
