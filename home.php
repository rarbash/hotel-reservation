<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="style.css">

  <?php
    session_start();
    $_SESSION["first_name"] = NULL;
    $_SESSION["family_name"] = NULL;
    $_SESSION["mobile_number"] = NULL;
    $_SESSION["email"] = NULL;
  ?>

  <nav>
    <img src="./image/leave.png" alt="leave" class="logo-icon">
    <div style="width: 100%;">
      <h1 class="logo-name ">ZWELL HOTEL CHIANG MAI</h1>
      <hr class="nav-line">
      <h4 class="navli"><strong>Hotel Overview</strong></h4>
    </div>
  </nav>

  <div class="img-box">
    <img src="./image/head.jpeg" alt="img header" class="img-headerback">
    <div class="text-header">
      <h5 style="color: white; font-family: 'Satisfy', cursive;">Zwell Hotel</h5>
      <h1 style="color: white; font-family: 'IBM Plex Sans', sans-serif;">CHIANG MAI</h1>
      <hr style="width: 20px;">
      <h5 style="color: white; font-family: 'IBM Plex Sans', sans-serif;">A HAVEN OF WELL-BEING IN NORTHERN THAILAND</h5>
    </div>
  </div>

  <div class="body">
    <br><br>
    <!-- <div> -->
      <h3 class="book-detail" style="margin-bottom: 0px;">If you are interested to stay at our</h3>
      <h3 class="book-detail">hotel. Click book now!!!</h3>
      <a href="/book-page1.php">
        <button class="book-btn book-box">
          <h3 style="font-weight: 100;">Book Now</h3>
        </button>
      </a>
    <!-- </div> -->
    <br><br>

    <div class="service">
      <hr>
      <h2 style="font-family: 'Noto Sans KR', sans-serif; display: flex;
      justify-content: center;">SERVICE</h2>
      <hr>
      <br>
      <div class="service-box">
          <div class="service-group">
            <img src="./image/outdoor.png" alt="activity" class="service-icon">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">ACTIVITIES</h4>
          </div>

          <div class="service-group">
            <img src="./image/cocktail.png" alt="activity" class="service-icon">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">RESTAURANTS & BARS</h4>
          </div>

          <div class="service-group">
            <img src="./image/parking.png" alt="activity" class="service-icon">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">TRANSPORTATION & PARKING</h4>
          </div>

          <div class="service-group">
            <img src="./image/forest.png" alt="activity" class="service-icon">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">HOTEL FACILITIES & AMENITIES</h4>
          </div>

          <div class="service-group">
            <img src="./image/bed.png" alt="activity" class="service-icon">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">SPA</h4>
          </div>

          <div class="service-group">
            <img src="./image/ring.png" alt="activity" class="service-icon">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">WDDINGS</h4>
          </div>

          <div class="service-group">
            <img src="./image/calendar.png" alt="activity" class="service-icon">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">MEETINGS & EVENTS</h4>
          </div>

      </div>
      <hr>
      <br>
      <h4 style="font-family: 'IBM Plex Sans', sans-serif; text-align: center;">
        Nestled among emerald rice fields, Zwell hotel Chiang Mai is a sanctuary of well-being, perfect for unwinding, recharging and finding your fulfilment with individually-tailored experiences. Journey on the path to well-being on your own terms - from a private pavilion overlooking the verdant landscape or the plush interiors of an exclusive residence.
      </h4>
    </div>
    <br>

    <div>
      <h2 style="font-family: 'Noto Sans KR', sans-serif; display: flex;
      justify-content: center;">ACCOMMODATIONS</h2>
      <br>
      <div class="slideshow-container">

        <div class="slide fade">
          <img src="./image/room3.jpeg" alt="room1" style="height: 35em;">
        </div>

        <div class="slide fade">
          <img src="./image/room2.jpeg" alt="room2" style="height: 35em;">
        </div>

        <div class="slide fade">
          <img src="./image/room1.jpeg" alt="room3" style="height: 35em;">
        </div>

        <div class="slide fade">
          <img src="./image/room4.jpeg" alt="room4" style="height: 35em;">
        </div>

        <div class="slide fade">
          <img src="./image/room5.jpeg" alt="room5" style="height: 35em;">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <script>
          var slideIndex = 1;
          showSlides(slideIndex);
          
          // Next/previous controls
          function plusSlides(n) {
            showSlides(slideIndex += n);
          }
          
          // Thumbnail image controls
          function currentSlide(n) {
            showSlides(slideIndex = n);
          }
          
          function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("slide");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
          }
        </script>

      </div>
    </div>
    <br><br>

    <div>
      <!-- bedtype1 -->
      <div class="bedtype-group">
        <img src="./image/room6.jpeg" alt="room6" style="height: 16em;">

        <div class="bedtype-infogroup font">
          <h4 style="align-self: center;"><strong>UPPER RICE TERRACE PAVILION
          </strong></h4>

          <div class="bedtype-info">
            <img src="./image/bed2.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">King or two twin beds, One rollaway or one crib</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/house.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">70 (m2) 750 (sq.ft.)</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/hired.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">3 adults, or 2 adults and 1 child)</h4>
          </div>
        </div>
      </div>
      <br><br>
      <!-- bedtype2 -->
      <div class="bedtype-group">
        <img src="./image/room7.jpeg" alt="room6" style="height: 16em;">

        <div class="bedtype-infogroup font">
          <h4 style="align-self: center;"><strong>RICE TERRACE PAVILION
          </strong></h4>

          <div class="bedtype-info">
            <img src="./image/bed2.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">King or two twin beds, One rollaway or one crib</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/house.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">70 (m2) 750 (sq.ft.)</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/hired.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">3 adults, or 2 adults and 1 child</h4>
          </div>
        </div>
      </div>
      <br><br>
      <!-- bedtype3 -->
      <div class="bedtype-group">
        <img src="./image/room8.jpeg" alt="room6" style="height: 16em;">

        <div class="bedtype-infogroup font">
          <h4 style="align-self: center;"><strong>UPPER GARDEN PAVILION
          </strong></h4>

          <div class="bedtype-info">
            <img src="./image/bed2.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">King or two twin beds, One rollaway or one crib</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/house.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">70 (m2) 750 (sq.ft.)</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/hired.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">3 adults, or 2 adults and 1 child</h4>
          </div>
        </div>
      </div>
      <br><br>
      <!-- bedtype4 -->
      <div class="bedtype-group">
        <img src="./image/room9.jpeg" alt="room6" style="height: 16em;">

        <div class="bedtype-infogroup font">
          <h4 style="align-self: center;"><strong>GARDEN PAVILION
          </strong></h4>

          <div class="bedtype-info">
            <img src="./image/bed2.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">King or two twin beds, One rollaway or one crib</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/house.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">70 (m2) 750 (sq.ft.)</h4>
          </div>

          <div class="bedtype-info">
            <img src="./image/hired.png" alt="bed size" class="bedtype-icon">
            <h4 class="font">3 adults, or 2 adults and 1 child</h4>
          </div>
        </div>
      </div>
      <br><br><br><br><br><br><br><br>
      <!-- END -->
    </div>
  </div>
  <footer>
    <br><br>
    <div class="footer">

      <div class="footer-info">
        <h4 class="footer-font font">Contact Us</h4><br>
        <h4 class="footer-font font">+1 111-222-3333</h4>
      </div>

      <div class="footer-info">
        <img src="./image/leave.png" alt="leave" class="logo-icon">
        <h4 class="footer-font font">ZWELL HOTEL</h4>
      </div>

      <div class="footer-info">
        <h4 class="footer-font font">Team Member</h4><br>
        <div>
          <span class="footer-id">
            <h4 class="footer-font font" style="margin-bottom: 5px;">Napisa Pattananwadee</h4>
            <h4 class="footer-font font"style="margin-left: 10px;">6222771899</h4>
          </span>

          <span class="footer-id">
            <h4 class="footer-font font" style="margin-bottom: 5px;">Chanatiwat Nillaphat</h4>
            <h4 class="footer-font font"style="margin-left: 25px;">6222780015</h4>
          </span>

          <span class="footer-id">
            <h4 class="footer-font font" style="margin-bottom: 5px;">Warat Kulkijkamjorn</h4>
            <h4 class="footer-font font"style="margin-left: 30px;">6222782185</h4>
          </span>

          <span class="footer-id">
            <h4 class="footer-font font" style="margin-bottom: 5px;">Kawiya Pholjaroen </h4>
            <h4 class="footer-font font"style="margin-left: 42px;">6222782425</h4>
          </span>
        </div>
      </div>

    </div>
    <br><br>
    <hr style="width:80em">
    <br><br>
  <div class="footer-icon-group">
    <img src="./image/facebook.png" alt="facebook" class="footer-icon">
    <img src="./image/twitter.png" alt="twitter" class="footer-icon">
    <img src="./image/ig.png" alt="ig" class="footer-icon">
  </div>
  <br><br>
  </footer>
</html>