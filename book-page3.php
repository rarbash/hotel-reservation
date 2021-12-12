<?php
  session_start();

  if (isset($_POST["Back"])) {
    $_POST["back"] = NULL;
    $url = "./book-page2.php";
    header("Location: $url");
  }

  if (isset($_POST["complete"])) {
    $mysqli = new mysqli("localhost", "root", null, "css325_zwell_hotel");

    if ($mysqli->connect_errno) {
      echo $mysqli->connect_error;
    }

    $queryID = "SELECT MAX(customer_id) AS latest_user FROM customer";
    $getID = $mysqli->query($queryID);
    while($row=$getID->fetch_array()){
      $id = $row["latest_user"];
    }
    $customer_id = ++$id;

    $queryID = "SELECT MAX(reservation_id) AS latest_reserv FROM reservation";
    $getID = $mysqli->query($queryID);
    while($row=$getID->fetch_array()){
      $id = $row["latest_reserv"];
    }
    $reservation_id = ++$id;

    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["family_name"];
    $mobile_no = $_SESSION["mobile_number"];
    $email_address = $_SESSION["email"];
    $country = $_SESSION["country"];

    switch ($_SESSION["room_type"]) {
      case "Upper Rice Terrace":
        $room_type_id = 101;
        break;
      case "Rice Terrace":
        $room_type_id = 201;
        break;
      case "Upper Garden":
        $room_type_id = 301;
        break;
      case "Garden":
        $room_type_id = 401;
        break;
    }
    $check_in_date = $_SESSION["check_in_date"];
    $check_out_date = $_SESSION["check_out_date"];
    $people_amount = $_SESSION["adult_number"] + $_SESSION["child_number"];

    $query1 = "INSERT INTO customer VALUES ('$customer_id', '$first_name', '$last_name', '$mobile_no', '$email_address', '$country')";
    $insert_customer = $mysqli->query($query1);
    if (!$insert_customer) {
      echo "Error:" . $mysqli->error;
    } else {
      $url = "./home.php";
      header("Location: $url");
    }

    $query2 = "INSERT INTO reservation VALUES ('$reservation_id', '$customer_id', '$room_type_id', '$check_in_date', '$check_out_date', '$people_amount')";
    $insert_reservation = $mysqli->query($query2);

    session_unset();
    session_destroy();
  }
?>

<html>
  <link rel="stylesheet" href="style.css">

  <div>
    <div class="book">
      <div>
        <img src="/image/des1.jpeg" alt="" class="img-new ">
        <div style="position: absolute; z-index: 1; top: 2em; width: 434px;">
          <div class="book-lefthand">
            <div class="grid-lefthand">
              <img src="./image/leave.png" alt="leave" class="book-icon ">
              <h2 class="text-lefthand">ZWELL HOTEL</h2>
            </div>
            <br><br><br><br>
            <div class="line"></div>
            <div class="grid-lefthand">
              <img src="./image/dot.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand-inactive">Personal Information</h3>
              <img src="./image/dot.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand-inactive ">Reservation</h3>
              <img src="./image/diamond.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand ">Complete</h3>
            </div>
          </div>
        </div>
      </div>

      <div style="background-color: black; width: 40em; height: 42em;">
        <h1 class="book-header" style="margin-top: 2em;">Please Choose Your </h1>
        <h1 class="book-header">Reservation</h1>
        <!-- input info -->
        <div class="grid-book-page3">
          <!-- Check-in-date -->
          <div>
            <h3 class="book-subtitle ">First Name:</h3>
            <h3 class="book-subtitle "><?php echo $_SESSION["first_name"]; ?></h3>
          </div>
          <!-- Check-out-date -->
          <div>
            <h3 class="book-subtitle ">Family Name:</h3>
            <h3 class="book-subtitle "><?php echo $_SESSION["family_name"]; ?></h3>
          </div>
          <!-- Adult && Child-->
          <div>
            <h3 class="book-subtitle ">Mobile Number:</h3>
            <h3 class="book-subtitle "><?php echo $_SESSION["mobile_number"]; ?></h3>
          </div>
          <!-- Country -->
          <div>
            <h3 class="book-subtitle ">Country:</h3>
            <h3 class="book-subtitle "><?php echo $_SESSION["country"]; ?></h3>
          </div>
          <!-- Country -->
          <div>
            <h3 class="book-subtitle ">Email:</h3>
            <h3 class="book-subtitle "><?php echo $_SESSION["email"]; ?></h3>
          </div>
          <!-- Country -->
          <div>
            <h3 class="book-subtitle ">Room Type:</h3>
            <h3 class="book-subtitle "><?php echo $_SESSION["room_type"]; ?></h3>
          </div>
          <!-- Country -->
          <div>
            <h3 class="book-subtitle ">Check-in-date:</h3>
            <h3 class="book-subtitle "><?php echo date("jS F Y", strtotime($_SESSION["check_in_date"])); ?></h3>
          </div>
          <!-- Country -->
          <div>
            <h3 class="book-subtitle ">Check-out-date:</h3>
            <h3 class="book-subtitle "><?php echo date("jS F Y", strtotime($_SESSION["check_out_date"])); ?></h3>
          </div>
          <!-- Country -->
          <div>
            <div class="grid-book">
              <div>
                <h3 class="book-subtitle ">Adult</h3>
                <h3 class="book-subtitle "><?php echo $_SESSION["adult_number"]; ?></h3>
              </div>
              <div>
                <h3 class="book-subtitle ">Child</h3>
                <h3 class="book-subtitle "><?php echo $_SESSION["child_number"]; ?></h3>
              </div>
            </div>
          </div>
        </div>
      <br><br><br><br><br>
      <script>
        function complete(){
          alert("Complete. Please check your email for confirmations details.")
        }
      </script>
      <!-- btn -->
      <form id="form" action="./book-page3.php" method="POST">
        <div class="grid-book">
          <a href="./book-page2.php" style="text-align: start;">
            <button class="back-btn" type="submit" value='back' name='Back'>
              <h3 style="font-weight: 100;">back</h3>
            </button>
          </a>
          <a href="./home.html" style="text-align: end;">
            <button class="next-btn" type="submit" value='complete' name='complete'>
              <h3 style="font-weight: 100;" onclick="complete()">Complete</h3>
            </button>
          </a>
        </div>
      </form>
      </div>
    </div>
  </div>
</html>