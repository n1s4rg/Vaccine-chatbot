<?php

require_once 'dbconfig.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$dob = $_POST["dob"];
$psprtnum = $_POST["psprtnum"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phonenum = $_POST["phonenum"];
$address = $_POST["address"];
$postalcode = $_POST["postalcode"];

$sqlstmt = "INSERT INTO user VALUES('','$fname','$lname','$dob','$gender','$email', '$address','$phonenum', '$psprtnum', '$postalcode')";

$result = mysqli_query($connection, $sqlstmt);

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Book Appointment_Vaccine Canada</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/book.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/whatsapp-chat-support.css">
    </head>

    <body>
        <nav>
            <div class="img">
                <img class="img" src="../img/logo.png" height="66px" width="166px">
            </div>
            <ul class="nav-list">
                <li class="nav-link">
                    <a href="index.html">Home</a>
                </li>
                <li class="nav-link">
                    <a href="myprofile.html">My Profile</a>
                </li>
                <li class="nav-link">
                    <a href="bookappointment.html">Book Appoinment</a>
                </li>
            </ul>
        </nav>

        <div id="main">
            <div class="container1">
                <h3><a class="info" href="www.google.com">Consult all Information on COVID 19</a></h3>
            </div>

            <div class="container">
                <h4 class="left_part">
                    <p class="showbox">VACCINATION CAMPAIGNS</p><br>

                    <strong>COVID-19:</strong> Book an appointment to complete your <br> immunization coverage.<br><br>

                    <strong>Vaccination is available for:</strong><br>

                    <ul>
                        <li> People aged 70 and over (3rd dose);</li>
                        <li>People who have received 2 doses of AstraZeneca or Covishield (3rd dose);</li>
                        <li>Immunocompromised or dialysis patients aged 12 years and over (3rd dose);</li>
                        <li>Children from 5 to 11 years old;</li>
                    </ul>
                    <br>
                    For more information on the COVID-19 vaccination campaign,<br> visit the website <br>
                    <a href="">Québec.ca / vaccinCOVID</a>
                    <br><br>
                    <strong>Seasonal flu :</strong> Make an appointment at a health facility or pharmacy near you to receive
                    the influenza vaccine.
                    <br><br>
                    Do not go to the vaccination clinic if you are in isolation or quarantine.
                </h4>
                <div class="wrapper">
                    
                </div>

            </div>
        </div>

        <footer class="footer">
            <div class="l-footer">
                <h1>
                    <img src="../img/logo.png" height="66px" width="166px">
                </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam atque recusandae in sit sunt
                    molestiae aliquid fugit. Mollitia eaque tempore iure sit nobis? Vitae nemo, optio maiores numquam quis
                    recusandae.</p>
            </div>
            <ul class="r-footer">
                <li>
                    <h2>
                        Social</h2>
                    <ul class="box">
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Departments </a></li>
                        <li><a href="#">Public service and military</a></li>
                    </ul>
                </li>

                <li>
                    <h2>
                        Legal</h2>
                    <ul class="box">
                        <li><a href="#">Prime Minister</a></li>
                        <li><a href="#">About government</a></li>
                        <li><a href="#">Open government</a></li>
                    </ul>
                </li>
            </ul>
            <div class="b-footer">
                <p>
                    All rights reserved by © Vaccine Canada </p>
            </div>
        </footer>
    </body>
</html>