<?php
include('conctn.php');
session_start();
$name = $password ='';//var
$errors = array('name' => '', 'password' =>'');//errorvar
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
	if(empty($_POST['password'])){
    $errors['password'] = 'A password is required <br />';
  }
	if(array_filter($errors))//error then print
  {
			echo "terminted";
		}
		else{//if not error then excute sql query

			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			$sql= 'SELECT  uid, user_name ,password from user';
            $result = mysqli_query($conn, $sql);
            $addc = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($addc);
			if(mysqli_query($conn, $sql))
			{
				echo "ready to head";
				foreach($addc as $check)
				{
				if(($name==$check['user_name'])&&($password==$check['password']))
				{
                  print_r($check["uid"]);
                  $_SESSION["user"]=$check["uid"];
				  header('Location:admin/adminpannel.php?uid='.$check["uid"] );//send id to next page
				}
				}
			}
			else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" style='
																    margin: 0;
																    height: 100%;
																' >
		<body  class="grey lighten-4" style='
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
																										height:100%;
																									' >
			<h3 class="center">login</h3>
			<form class="white" action="" method="POST" style="	filter: drop-shadow(5px 5px 3px black);">

			<label>name</label>
			<input type="text" name="name" value="">
		 	<div class="red-text">
		 	<?php echo $errors['name']; ?>
		 		
		 	</div>


			<label>password</label>
			<input type="password" name="password" value="">
			<div class="red-text">
			<?php echo $errors['password']; ?>
				
			</div>


			<div class="center">
			<input type="submit" name="submit" value="login" class="btn brand z-depth-0">
			</div>
							<style>
								.btn:hover{
									filter: drop-shadow(3px 3px 2px black);
									transform:scale(1.1);
								}
							</style>
			</form>
			<div class="bottom">
			<h6 class="center">don't have an account? <a href="adminsign.php">Sign in</a>
			</h6>
			</div>
			<div class="cover" style="padding:0;
																			margin-top:2vh;
																			height:50vh;">
								<img class="dota1" src="2.svg" alt="" style=' position: absolute;
																															top:32vh;
																															right:40%;
																															padding:0 ;
																															transform: scale(0.5);
																														' />
						</div>
					</section>
			</main>
			<?php include 'admin/includes/footer.php'; ?>
		</body>

</html>
