<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//files
require($_SERVER['HOME'] . '/dbcreds.php');
require ('includes/guestFunctions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS (Make sure Bootstrap is first) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/resumestyles.css">
    <link rel="stylesheet" href="styles/guestbook.css">

    <title>Guestbook</title>
    <!-- **********************************************
                        Favicon
      ********************************************** -->
    <link rel="icon" type="image/png" href="images/book-icon.png">
</head>

<body>
<!-- **********************************************
                        Header/Jumbotron
      ********************************************** -->
<div class="jumbotron jumbotron-fluid pb-5 pt-5">
    <div class="container">
        <h1 class="text-center mb-4">Tiffany Ferderer</h1>
        <div class="justify-content-end">
            <div class="row align-text-bottom">
                <div class="col-6 mb-2">tifferderer@yahoo.com</div>
                <div class="col-6 text-right"><a class="text-dark" href="https://www.linkedin.com/in/tiffany-ferderer-64700b1b8/">LinkedIn</a></div>
            </div>
            <div class="row">
                <div class="col-6 mb-2">(253)394-3053</div>
                <div class="col-6 text-right"><a class="text-dark" href="https://github.com/tifferderer">Github</a></div>
            </div>
        </div>
    </div>
</div>

<div class="container vh-100" id="main">

    <?php
    $isValid = true;

    //Name validation
    if(validInfo($_POST['fname'])) {
        $fname = $_POST['fname'];
    }
    else {
        echo "<p>Invalid first name</p>";
        $isValid = false;

    }
    if(validInfo($_POST['lname'])) {
        $lname = $_POST['lname'];
    }
    else {
        echo "<p>Invalid last name</p>";
        $isValid = false;
    }

    //Validate LinkedIn
    $linkedin = $_POST['linkedin'];
    if(validInfo($_POST['email'])) {
        if (!((substr($linkedin, 0, 4) == "http") && (substr($linkedin, -4) == ".com"))) {
            echo "<p> Please enter a valid LinkedIn URL.</p>";
            $isValid = false;
        }
    }

    //Validate email
    $email = $_POST['email'];
    if(validInfo($_POST['email'])) {
        if(!((strpos($email, "@")) AND (strpos($email, '.')))){
            echo "<p> Please enter a valid email.</p>";
            $isValid = false;
        }
    }

    //Validate How We Met
    if(isset($_POST['meet'])) {
        $meet = $_POST['meet'];
        if(!validGreet($meet)) {
            echo "<p> Please enter where we met. </p>";
            $isValid = false;
        }
        if($meet == 'other') {
            if(validInfo($_POST['other'])) {
                $other = $_POST['other'];
            }
            else {
                echo "<p>Please fill out how we met.</p>";
                $isValid = false;
            }
        }
    }

    //Check the mailing list
    if(isset($_POST['add_mail'])) {
        $add_mail = "Yes";
        if(!validInfo($email)) {
            echo "<p>Please enter an email address.</p>";
            $isValid = false;
        }
    }
    else {
        $add_mail = "No";
    }

    $title = $_POST['title'];
    $company = $_POST['company'];
    $other = $_POST['other'];
    $message = $_POST['message'];
    $mailing = $_POST['mailing'];

    if(!$isValid) {
        echo "<p> Please go back and review.</p>";
        return;
    }

    //Prevent SQL Injection
    $fname = mysqli_real_escape_string($cnxn, $fname);
    $lname = mysqli_real_escape_string($cnxn, $lname);
    $linkedin = mysqli_real_escape_string($cnxn, $linkedin);
    $email = mysqli_real_escape_string($cnxn, $email);
    $title = mysqli_real_escape_string($cnxn, $title);
    $company = mysqli_real_escape_string($cnxn, $company);
    $meet = mysqli_real_escape_string($cnxn, $meet);
    $other = mysqli_real_escape_string($cnxn, $other);
    $message = mysqli_real_escape_string($cnxn, $message);
    $add_mail = mysqli_real_escape_string($cnxn, $add_mail);
    $mailing = mysqli_real_escape_string($cnxn, $mailing);

//    //save order to database
    $sql = "INSERT INTO guestbook(`fname`, `lname`, `title`, `company`, `linkedin`, `email`, `meet`,`other_meet`, `message`, `add_mail`, `mailing`) VALUES
 ('$fname', '$lname', '$title', '$company', '$linkedin', '$email', '$meet', '$other', '$message', '$add_mail', '$mailing')";

    $success = mysqli_query($cnxn, $sql);
    if(!$success) {
        echo "<p>Sorry something went wrong </p>";
        return;
    }
    ?>
    <h1>Thank You For Your Inquiry</h1>

     <?php
    //Print order summary
        echo "<p>Name:  $fname $lname</p>";
        echo "<p>Title: $title </p>";
        echo "<p>Company: $company</p>";
        echo "<p>LinkedIn URL: $linkedin</p>";
        echo "<p>Email: $email</p>";
        echo "<p>How we met: $meet $other</p>";
        echo "<p>Message: $message</p>";
        echo "<p>Add to the mailing list: $add_mail</p>";
        ?>

</div>

<footer class="jumbotron jumbotron-fluid text-right" style="margin-bottom:0">
    <nav class="nav d-inline">
        <div class="navbar-collapse justify-content-end mr-5">
            <ul class="navbar-nav text-right">
                <li class="nav-item inline float-right">
                    <a class="nav-link text-dark" href="http://tferderer.greenriverdev.com/SDEV305/portfolioproject/resume.html">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="http://tferderer.greenriverdev.com/SDEV305/portfolioproject/guestbook.html">Guestbook</a>
                </li>
            </ul>
        </div>
    </nav>
</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>