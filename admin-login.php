<?php
  $conn = mysqli_connect("localhost","root",null,"css325_zwell_hotel");
  session_start();

  unset($_SESSION['staff_id']);

    $errors = array();

    if (isset($_POST['login_button'])){
        $staff_id = mysqli_real_escape_string($conn, $_POST['userName']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($staff_id)){
            array_push($errors, "Username is required");
            $_SESSION['error']="Username is required";
        }

        elseif(empty($password)){
            array_push($errors, "Password is required");
            $_SESSION['error']="Password is required";
        }

        if(count($errors)==0){
            


            $query= "SELECT * FROM staff WHERE staff_id='$staff_id'";
            $result= mysqli_query($conn, $query);

            if(mysqli_num_rows($result)==1){
              if($password=='123'){
                $_SESSION['staff_id']=$staff_id;
                header("location: admin-reservation.php");
              }
              else{
                array_push($errors, "Wrong Password");
                $_SESSION['error']="Wrong Password";
              }  
            }
            else{
                array_push($errors, "Wrong Username");
                $_SESSION['error']="Wrong Username";
            }
        }
    }
?>

<html>
  <link rel="stylesheet" href="style.css">
  <div class="align-admin" style="margin-top: 5em;">
    <h1 class="text-admin">Zwell Hotel</h1>
    <h1 class="text-admin">Staff Page</h1>
    <form action="" method="POST" style="margin: 2em;">
      <div class="align-admin">
        <input type="text" name="userName" placeholder="User Name" class="input-box-admin" >
        <input type="text" name="password" placeholder="Password" class="input-box-admin">
        <?php if(isset($_SESSION['error'])){
						echo '<p class="error">'.
							$_SESSION['error'];
							unset($_SESSION['error']); 
						echo '</p>';
					}
					else{
						echo '<p style="margin: 1em;"></p>';
					}
				?>
        <button name="login_button" class="back-btn">
          <h3 style="font-weight: 100;">Login</h3>
        </button>
      </div>
        
    </form>

  </div>

</html>