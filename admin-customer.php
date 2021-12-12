<?php 
	include('server.php'); 
  $staff_id=$_SESSION['staff_id'];
  $sql= "SELECT * FROM customer ORDER BY customer_id";
  $result= mysqli_query($conn, $sql);

  if (isset($_POST['submit'])){
    $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
    if(empty($customer_id)){
      array_push($errors, "customer_id is required");
      $_SESSION['error']="customer_id is required";
    }
    else{
      $sql1= "DELETE FROM customer WHERE customer_id=$customer_id";
      $result1= mysqli_query($conn, $sql1);
      if (!$result1){
        array_push($errors, "Update failed!");
        $_SESSION['error']="Update failed!";
      }
      else{
        header('location: admin-customer.php');
      }
    }
  } 
?>

<html>
<link rel="stylesheet" href="style.css">

<div class="admin-nav">
  <div class="grid-lefthand" style="margin-left: 1em;">
    <img src="./image/leave.png" alt="leave" class="book-icon ">
    <h2 class="text-lefthand">ZWELL HOTEL</h2>
  </div>
  <div>
    <a href="./admin-login.php" name="logout" class="navli" style="margin-left: 69em;">Log Out</a>
  </div>
</div>
<div class="admin-grid">
  <div>
    <a href="./admin-reservation.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Reservation</h2>
    </a>
    <a href="" class="admin-lefthand-active">
      <h2 class="text-admin" style="text-align: center;">Customer</h2>
    </a>
    <a href="./admin-payment.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Payment</h2>
    </a>
    <a href="./admin-room-ass.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Room Assignment</h2>
    </a>
    <a href="./admin-room-ser.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Request Service</h2>
    </a>
    <a href="./admin-permonth.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Details Per Month</h2>
    </a>
  </div>
  <!-- Customer -->
  <div class="admin-right">
    <h1 class="text-admin" style="margin: 2em;"><strong>Customer</strong></h1>
    <table>
      <tr>
        <th>customer_id</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>mobile_no</th>
        <th>email_address</th>
        <th>country</th>
      </tr>
      <!-- echo this -->
      <?php
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
          echo '<tr>';
          echo "<td>".$row['customer_id']."</td>";
          echo "<td>".$row['first_name']."</td>";
          echo "<td>".$row['last_name']."</td>";
          echo "<td>".$row['mobile_no']."</td>";
          echo "<td>".$row['email_address']."</td>";
          echo "<td>".$row['country']."</td>";
          echo '</tr>';
        }   
      ?>
    </table>
    <br><br>
    <hr style="width: 80%;">
    <br>
    <!-- delete -->
    <form action="" method="POST" style="text-align: center;">
      <h2 class="text-admin">Delete Customer</h2>
      <div class="admin-grid">
        <div>
          <h3 class="text-admin" style="margin: 1em;">customer_id</h3>
          <input type="text" name="customer_id">
        </div>
      </div>
      <br>
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
      <button name="submit" class="back-btn">
          <h3 style="font-weight: 100;">Delete</h3>
      </button>
    </form>
  </div>
</div>
</html>