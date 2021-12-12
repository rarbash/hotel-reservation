<?php
  session_start();

  $error = "";

  if (isset($_POST["back"])) {
    $_POST["back"] = NULL;
    $url = "./home.php";
    header("Location: $url");

    session_unset();
    session_destroy();
  }

  if (isset($_POST["submit"])) {
    $_SESSION["first_name"] = $_POST["firstName"];
    $_SESSION["family_name"] = $_POST["familyName"];
    $_SESSION["mobile_number"] = $_POST["mobile"];
    if (isset($_POST["country"])) {
      $_SESSION["country"] = $_POST["country"];
    }
    $_SESSION["email"] = $_POST["email"];
    $_POST["submit"] = NULL;

    if (isset($_POST["firstName"]) && isset($_POST["familyName"]) && isset($_POST["mobile"]) && 
        isset($_POST["country"]) && isset($_POST["email"])) {
      $error = "";
      $url = "./book-page2.php";
      header("Location: $url");
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
              <img src="./image/diamond.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand">Personal Information</h3>
              <img src="./image/dot.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand-inactive ">Reservation</h3>
              <img src="./image/dot.png" alt="leave" class="shape-icon">
              <h3 class="text-lefthand-inactive ">Complete</h3>
            </div>
          </div>
        </div>
      </div>

      <div style="background-color: black; width: 40em; height: 42em;">
        <form id="form" action="./book-page1.php" method="POST">
          <h1 class="book-header" style="margin-top: 2em;">Please Input Your </h1>
          <h1 class="book-header">Detail</h1>
          <!-- input info -->
            <div class="grid-book">
              <!-- first name -->
              <div style="justify-self: center;">
                <h2 class="book-subtitle ">First Name</h2>
                <input type="text" name="firstName" placeholder="First Name" value="<?php echo $_SESSION['first_name']; ?>" class="book-input-box">
              </div>
              <!-- Family name -->
              <div style="justify-self: center;">
                <h2 class="book-subtitle ">Family Name</h2>
                <input type="text" name="familyName" placeholder="Family Name" value="<?php echo $_SESSION['family_name']; ?>" class="book-input-box">
              </div>
              <!-- Mobile Number-->
              <div style="justify-self: center;">
                <h2 class="book-subtitle ">Mobile Number</h2>
                <input type="text" name="mobile" placeholder="(+99)999999999" value="<?php echo $_SESSION["mobile_number"]; ?>" class="book-input-box">
              </div>
              <!-- Country -->
              <div style="justify-self: center;">
                <!-- <h2 class="book-subtitle">Country</h2>
                <input type="text" name="familyName" placeholder="Family Name" class="book-input-box"> -->
                <h2 class="book-subtitle">Country</h2>
                <select name="country" class="book-input-box">
                  <option value="" disabled selected hidden>--select a country--</option>
                  <option value="Afganistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bonaire">Bonaire</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Curaco">Curacao</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="East Timor">East Timor</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Great Britain">Great Britain</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Hawaii">Hawaii</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="India">India</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Korea North">Korea North</option>
                  <option value="Korea South">Korea South</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macau">Macau</option>
                  <option value="Macedonia">Macedonia</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Nambia">Nambia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="Nevis">Nevis</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palestine">Palestine</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Phillipines">Philippines</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Republic of Montenegro">Republic of Montenegro</option>
                  <option value="Republic of Serbia">Republic of Serbia</option>
                  <option value="Reunion">Reunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saipan">Saipan</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Tahiti">Tahiti</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Erimates">United Arab Emirates</option>
                  <option value="United States of America">United States of America</option>
                  <option value="Uraguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City State">Vatican City State</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zaire">Zaire</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
              </div>
              <!-- Email -->
              <div style="justify-self: center;">
                <h2 class="book-subtitle">Email</h2>
                <input type="text" name="email" placeholder="@email.com" value="<?php echo $_SESSION["email"]; ?>" class="book-input-box">
              </div>
            </div>
          <br>
          <div class='font' style='color: red; margin-left: 6em; height: 16px;'><?php echo $error; ?></div>
          <br>
          <!-- btn -->
          <div class="grid-book">
            <a href="./home.html" style="text-align: start;">
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
  </div>
</html>