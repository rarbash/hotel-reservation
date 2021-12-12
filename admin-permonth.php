<?php 
    include('server.php'); 
    $staff_id=$_SESSION['staff_id'];
    $sql= "CALL build_details_per_month";
    $result= mysqli_query($conn, $sql);

    if (isset($_POST['submit'])){
        $url = "./admin-permonth.php";
        header("Location: $url");
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
    <a href="./admin-room-ass.php" class="admin-lefthand">
    <h2 class="text-admin" style="text-align: center;">Room Assignment</h2>
    </a>
    <a href="./admin-room-ser.php" class="admin-lefthand">
    <h2 class="text-admin" style="text-align: center;">Request Service</h2>
    </a>
    <a href="./admin-permonth.php" class="admin-lefthand-active">
    <h2 class="text-admin" style="text-align: center;">Details Per Month</h2>
    </a>
</div>
<!-- reservation -->
<div class="admin-right">
    <h1 class="text-admin" style="margin: 2em;"><strong>Details Per Month</strong></h1>
    <table>
    <tr>
        <th>Month</th>
        <th class='small-width'>people_count</th>
        <th class='small-width'>reservation_count</th>
        <th class='small-width'>total_income</th>

    </tr>
    <!-- echo this -->

    <?php
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo '<tr>';
        echo "<td>".$row['month']."</td>";
        echo "<td>".$row['people_count']."</td>";
        echo "<td>".$row['reservation_count']."</td>";
        echo "<td>".$row['total_income']."</td>";
        echo '</tr>';
        }   
    ?>          

    </table>
    <br><br>
    <form id="form" action="./admin-permonth.php" method="POST">
    <button type="submit" name="submit" class="back-btn">
        <h3 style="font-weight: 100;">Refresh</h3>
    </button>
    </form>
    <br><br><br><br><br><br>
</div>
</div>
</html>