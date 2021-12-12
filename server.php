<?php
    $conn = mysqli_connect("localhost","root",null,"css325_zwell_hotel");
    
    session_start();
    include('errors.php'); 

    if(!isset($_SESSION['staff_id'])){
        header('location: admin-login.php');
    }

    // if(isset($_GET[logout])){
    //     session_destroy();
    //     unset($_SESSION['staff_id']);
    //     header('location: admin-login.php');
    // }

?>

