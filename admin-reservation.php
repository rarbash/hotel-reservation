<?php 
	include('server.php'); 
  $staff_id=$_SESSION['staff_id'];
  $sql= "SELECT * FROM reservation ORDER BY reservation_id";
  $result= mysqli_query($conn, $sql);

  if (isset($_POST['submit'])){
    $reservation_id = mysqli_real_escape_string($conn, $_POST['reservation_id']);
    $room_type_id = mysqli_real_escape_string($conn, $_POST['room_type_id']);
    $check_in_date = mysqli_real_escape_string($conn, $_POST['check_in_date']);
    $check_out_date = mysqli_real_escape_string($conn, $_POST['check_out_date']);
    $people_amount = mysqli_real_escape_string($conn, $_POST['people_amount']);
    if(empty($reservation_id)){
      array_push($errors, "reservation_id is required");
      $_SESSION['error']="reservation_id is required";
    }
    elseif(empty($room_type_id)){
      array_push($errors, "room_type_id is required");
      $_SESSION['error']="room_type_id is required";
    }
    elseif(empty($check_in_date)){
      array_push($errors, "check_in_date is required");
      $_SESSION['error']="check_in_date is required";
    }
    elseif(empty($check_out_date)){
      array_push($errors, "check_out_date is required");
      $_SESSION['error']="check_out_date is required";
    }
    elseif(empty($people_amount)){
      array_push($errors, "people_amount is required");
      $_SESSION['error']="people_amount is required";
    }
    else{
      $sql1= "SELECT * FROM room_assignment,reservation WHERE room_assignment.reservation_id=$reservation_id AND room_assignment.reservation_id=reservation.reservation_id";
      $result1= mysqli_query($conn, $sql1);
      $customer_id = mysqli_fetch_array($result1,MYSQLI_ASSOC);
      $sql2= "INSERT INTO reservation VALUES ('$reservation_id','$customer_id','$room_type_id','$check_in_date','$check_out_date','$people_amount')";
      $result2= mysqli_query($conn, $sql2);
      if (!$result2){
        array_push($errors, "Update failed!");
        $_SESSION['error']="Update failed!";
      }
      else{
        header('location: admin-reservation.php');
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
    <a href="" class="admin-lefthand-active">
      <h2 class="text-admin" style="text-align: center;">Reservation</h2>
    </a>
    <a href="./admin-customer.php" class="admin-lefthand">
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
  <!-- reservation -->
  <div class="admin-right">
    <h1 class="text-admin" style="margin: 2em;"><strong>Reservation</strong></h1>
    <table>
      <tr>
        <th>reservation_id</th>
        <th>customer_id</th>
        <th>room_type_id</th>
        <th>check_in_date</th>
        <th>check_out_date</th>
        <th>people_amount</th>
      </tr>
      <!-- echo this -->

      <?php
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
          echo '<tr>';
          echo "<td>".$row['reservation_id']."</td>";
          echo "<td>".$row['customer_id']."</td>";
          echo "<td>".$row['room_type_id']."</td>";
          echo "<td>".$row['check_in_date']."</td>";
          echo "<td>".$row['check_out_date']."</td>";
          echo "<td>".$row['people_amount']."</td>";
          echo '</tr>';
        }   
      ?>          


    </table>
    <br><br>
    <hr style="width: 80%;">
    <br>
    <!-- update -->
    <h2 class="text-admin">Update Reservation</h2>
    <form action="" method="POST" style="text-align: center;">
      <div class="admin-grid-reser">
        <div>
          <h3 class="text-admin" style="margin: 1em;">reservation_id</h3>
          <input type="text" name="reservation_id">
        </div>
        <div>
          <h3 class="text-admin" style="margin: 1em;">room_type_id</h3>
          <input type="text" name="room_type_id">
        </div>
        <div>
          <h3 class="text-admin" style="margin: 1em;">check_in_date</h3>
          <input type="text" name="check_in_date">
        </div>
        <div>
          <h3 class="text-admin" style="margin: 1em;">check_out_date</h3>
          <input type="text" name="check_out_date">
        </div>
        <div>
          <h3 class="text-admin" style="margin: 1em;">people_amount</h3>
          <input type="text" name="people_amount">
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
        <h3 style="font-weight: 100;">Submit</h3>
    </button>
    </form>
  </div>
</div>
</html>