<?php 
	include('server.php'); 
  $staff_id=$_SESSION['staff_id'];
  $sql= "SELECT * FROM payment ORDER BY payment_id";
  $result= mysqli_query($conn, $sql);

  $sql1= "SELECT * FROM payment ORDER BY payment_id DESC LIMIT 1";
  $result1= mysqli_query($conn, $sql1);
  while ($lastest_id = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    $id=++$lastest_id['payment_id'];
  }

  if (isset($_POST['submit'])){
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    
    if(empty($date)){
      array_push($errors, "date is required");
      $_SESSION['error']="date is required";
    }
    elseif(empty($amount)){
      array_push($errors, "amount is required");
      $_SESSION['error']="amount is required";
    }
    elseif(empty($room_id)){
      array_push($errors, "room_id is required");
      $_SESSION['error']="room_id is required";
    }
    else{
      $sql2= "INSERT INTO payment VALUES ('$id','$date','$amount','$room_id','$staff_id')";
      $result2= mysqli_query($conn, $sql2);
      if (!$result2){
        array_push($errors, "Update failed!");
        $_SESSION['error']="Update failed!";
      }
      else{
        header('location: admin-payment.php');
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
    <a href="./admin-customer.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Customer</h2>
    </a>
    <a href="" class="admin-lefthand-active">
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
  <!-- Payment -->
  <div class="admin-right">
    <h1 class="text-admin" style="margin: 2em;"><strong>Payment</strong></h1>
    <table>
      <tr>
        <th>payment_id</th>
        <th>date</th>
        <th>amount</th>
        <th>rassignment_id</th>
        <th>staff_id</th>
      </tr>
      <!-- echo this -->
      <?php
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
          echo '<tr>';
          echo "<td>".$row['payment_id']."</td>";
          echo "<td>".$row['date']."</td>";
          echo "<td>".$row['amount']."</td>";
          echo "<td>".$row['rassignment_id']."</td>";
          echo "<td>".$row['staff_id']."</td>";
          echo '</tr>';
        }   
      ?>
    </table>
    <br><br>
    <hr style="width: 80%;">
    <br>
    <!-- add -->
    <h2 class="text-admin">Add Payment</h2>
    <form action="" method="POST" style="text-align: center;">
    <div class="admin-grid-pay">
      <div>
        <h3 class="text-admin" style="margin: 1em;">date</h3>
        <input type="text" name="date">
      </div>
      <div>
        <h3 class="text-admin" style="margin: 1em;">amount</h3>
        <input type="text" name="amount">
      </div>
      <div>
        <h3 class="text-admin" style="margin: 1em;">room_id</h3>
        <input type="text" name="room_id">
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
    <button class="back-btn" name="submit">
        <h3 style="font-weight: 100;">Submit</h3>
    </button>
    </form>
  </div>
</div>
</html>