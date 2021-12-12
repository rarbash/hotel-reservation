<?php 
	include('server.php');
  $staff_id=$_SESSION['staff_id']; 
  $sql= "SELECT * FROM room_assignment ORDER BY rassignment_id";
  $result= mysqli_query($conn, $sql);

  $sql1= "SELECT * FROM room_assignment ORDER BY rassignment_id DESC LIMIT 1";
  $result1= mysqli_query($conn, $sql1);
  while ($lastest_id = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    $id=++$lastest_id['rassignment_id'];
  }

  if (isset($_POST['submit'])){
    $error_position=1;
    $reservation_id = mysqli_real_escape_string($conn, $_POST['reservation_id']);
    $people_amount = mysqli_real_escape_string($conn, $_POST['people_amount']);
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    
    if(empty($reservation_id)){
      array_push($errors, "reservation_id is required");
      $_SESSION['error']="reservation_id is required";
    }
    elseif(empty($people_amount)){
      array_push($errors, "people_amount is required");
      $_SESSION['error']="people_amount is required";
    }
    elseif(empty($room_id)){
      array_push($errors, "room_id is required");
      $_SESSION['error']="room_id is required";
    }
    else{
      $sql2= "INSERT INTO room_assignment VALUES ('$id','$room_id','$reservation_id','$people_amount')";
      $result2= mysqli_query($conn, $sql2);
      if (!$result2){
        array_push($errors, "Update failed!");
        $_SESSION['error']="Update failed!";
      }
      else{
        header('location: admin-room-ass.php');
      }
    }
  } 

  if (isset($_POST['delete'])){
    $error_position=0;
    $rassignment_id = mysqli_real_escape_string($conn, $_POST['rassignment_id']);
    if(empty($rassignment_id)){
      array_push($errors, "rassignment_id is required");
      $_SESSION['error']="rassignment_id is required";
    }
    else{
      $sql3= "DELETE FROM room_assignment WHERE rassignment_id=$rassignment_id";
      $result3= mysqli_query($conn, $sql3);
      if (!$result2){
        array_push($errors, "Update failed!");
        $_SESSION['error']="Update failed!";
      }
      else{
        header('location: admin-room-ass.php');
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
    <a href="./admin-payment.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Payment</h2>
    </a>
    <a href="" class="admin-lefthand-active">
      <h2 class="text-admin" style="text-align: center;">Room Assignment</h2>
    </a>
    <a href="./admin-room-ser.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Request Service</h2>
    </a>
    <a href="./admin-permonth.php" class="admin-lefthand">
      <h2 class="text-admin" style="text-align: center;">Details Per Month</h2>
    </a>
  </div>
  <!-- Room Assignment -->
  <div class="admin-right">
    <h1 class="text-admin" style="margin: 2em;"><strong>Room Assignment</strong></h1>
    <table>
      <tr>
        <th>rassignment_id</th>
        <th>room_id</th>
        <th>reservation_id</th>
        <th>people_amount</th>
      </tr>
      <!-- echo this -->
      <?php
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
          echo '<tr>';
          echo "<td>".$row['rassignment_id']."</td>";
          echo "<td>".$row['room_id']."</td>";
          echo "<td>".$row['reservation_id']."</td>";
          echo "<td>".$row['people_amount']."</td>";
          echo '</tr>';
        }   
      ?>
    </table>
    <br><br>
    <hr style="width: 80%;">
    <br>
    <!-- add -->
    <h2 class="text-admin">Add Room Assignment</h2>
    <form action="" method="POST" style="text-align: center;">
    <div class="admin-grid-pay">
      <div>
        <h3 class="text-admin" style="margin: 1em;">reservation_id</h3>
        <input type="text" name="reservation_id">
      </div>
      <div>
        <h3 class="text-admin" style="margin: 1em;">room_id</h3>
        <input type="text" name="room_id">
      </div>
      <div>
        <h3 class="text-admin" style="margin: 1em;">people_amount</h3>
        <input type="text" name="people_amount">
      </div>
    </div>
    <br>
    <?php if(isset($_SESSION['error'])){
            if($error_position==1){
						echo '<p class="error">'.
							$_SESSION['error'];
							unset($_SESSION['error']); 
						echo '</p>';
					}}
					else{
						echo '<p style="margin: 1em;"></p>';
					}
		  ?>
    <button class="back-btn" name="submit">
        <h3 style="font-weight: 100;">Submit</h3>
    </button>
    </form>
    <br>
    <hr style="width: 80%;">
    <br>
    <!-- delete -->
    <h2 class="text-admin">Delete Room Assignment</h2>
    <form action="" method="POST" style="text-align: center;">
    <div class="admin-grid">
      <div>
        <h3 class="text-admin" style="margin: 1em;">rassignment_id</h3>
        <input type="text" name="rassignment_id">
      </div>
    </div>
    <br>
    <?php if(isset($_SESSION['error'])){
          if($error_position==0){
						echo '<p class="error">'.
							$_SESSION['error'];
							unset($_SESSION['error']); 
						echo '</p>';
					}}
					else{
						echo '<p style="margin: 1em;"></p>';
					}
		  ?>
    <button name="delete" class="back-btn">
        <h3 style="font-weight: 100;">Delete</h3>
    </button>
    </form>
  </div>
</div>
</html>