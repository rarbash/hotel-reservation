<?php
  session_start();

  $error = "";

  if (isset($_POST["back"])) {
    $_POST["back"] = NULL;
    $url = "./book-page1.php";
    header("Location: $url");
  }

  if (isset($_POST["submit"])) {
    $_SESSION["check_in_date"] = $_POST["cheakIn"];
    $_SESSION["check_out_date"] = $_POST["checkOut"];
    $_SESSION["adult_number"] = $_POST["adult"];
    $_SESSION["child_number"] = $_POST["child"];
    if (isset($_POST["roomtype"])) {
      $_SESSION["room_type"] = $_POST["roomtype"];
    }
    $_POST["submit"] = NULL;

    if ($_SESSION["check_in_date"] < date("Y-m-d") || $_SESSION["check_out_date"] <= date("Y-m-d") || 
        $_SESSION["check_in_date"] >= $_SESSION["check_out_date"]) {
      $error = "Please fill valid dates";
    } elseif (isset($_POST["cheakIn"]) && isset($_POST["checkOut"]) && isset($_POST["adult"]) && 
              isset($_POST["child"]) && isset($_POST["roomtype"])) {
      if ($_POST["roomtype"] == "Upper Rice Terrace" && ($_POST["adult"] + $_POST["child"]) > 2) {
        $error = "An Upper Rice Terrace room can be reserved for at most 2 visitors";
      } elseif ($_POST["roomtype"] == "Rice Terrace" && ($_POST["adult"] + $_POST["child"]) > 4) {
        $error = "A Rice Terrace room can be reserved for at most 4 visitors";
      } elseif ($_POST["roomtype"] == "Upper Garden" && ($_POST["adult"] + $_POST["child"]) > 6) {
        $error = "A Upper Garden room can be reserved for at most 6 visitors";
      } elseif ($_POST["roomtype"] == "Garden" && ($_POST["adult"] + $_POST["child"]) > 8) {
        $error = "A Garden room can be reserved for at most 8 visitors";
      } else {
        $error = "";
        $url = "./book-page3.php";
        header("Location: $url");
      }
    } else {
      $error = "Please fill all information fields";
    }
  }
?>

<html>
  <link rel="stylesheet" href="style.css">

  <div>
    <div class="book">
      <div>
        <img src="./image/des1.jpeg" alt="" class="img-new ">
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
              <img src="./image/diamond.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand ">Reservation</h3>
              <img src="./image/dot.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand-inactive ">Complete</h3>
            </div>
          </div>
        </div>
      </div>

      <div style="background-color: black; width: 40em; height: 42em;">
        <form id="form" action="./book-page2.php" method="POST">
          <h1 class="book-header" style="margin-top: 2em;">Please Choose Your </h1>
          <h1 class="book-header">Reservation</h1>
          <!-- input info -->
          <div class="grid-book">
            <!-- Check-in-date -->
            <div style="justify-self: center;">
              <h2 class="book-subtitle ">Check-in-date</h2>
              <input type="date" name="cheakIn" value="<?php echo $_SESSION["check_in_date"]; ?>" class="book-input-box">
            </div>
            <!-- Check-out-date -->
            <div style="justify-self: center;">
              <h2 class="book-subtitle ">Check-out-date</h2>
              <input type="date" name="checkOut" value="<?php echo $_SESSION["check_out_date"]; ?>" class="book-input-box">
            </div>
            <!-- Adult && Child-->
            <div class="grid-book">
              <div style="justify-self: center;">
                <h2 class="book-subtitle ">Adult</h2>
                <input type="number" name="adult" placeholder="0" value="<?php echo $_SESSION["adult_number"]; ?>" class="book-input-box-num">
              </div>
              <div style="justify-self: center;">
                <h2 class="book-subtitle ">Child</h2>
                <input type="number" name="child" placeholder="0" value="<?php echo $_SESSION["child_number"]; ?>" class="book-input-box-num">
              </div>
            </div>
            <!-- Country -->
            <div style="justify-self: center;">
              <!-- <h2 class="book-subtitle">Country</h2>
              <input type="text" name="familyName" placeholder="Family Name" class="book-input-box"> -->
              <h2 class="book-subtitle">Room Type</h2>
              <select name="roomtype" class="book-input-box">
                <option value="" disabled selected hidden>--select a room type--</option>
                <option value="Upper Rice Terrace">Upper Rice Terrace</option>
                <option value="Rice Terrace">Rice Terrace</option>
                <option value="Upper Garden">Upper Garden</option>
                <option value="Garden">Garden</option>
              </select>
            </div>
          </div>
          <br><br><br><br><br><br><br><br>
          <div class='font' style='color: red; margin-left: 6em; height: 16px;'> <?php echo $error; ?></div>
          <br>
        <!-- btn -->
        <div class="grid-book">
          <a href="./book-page1.php" style="text-align: start;">
            <button class="back-btn " type="submit" value='Back' name='back'>
              <h3 style="font-weight: 100;">back</h3>
            </button>
          </a>
          <a style="text-align: end;">
            <button class="next-btn" type="submit" value='Submit' name='submit'>
              <h3 style="font-weight: 100;">Next</h3>
            </button>
          </a>
        </div>
      </form>
    </div>
  </div>
</html>