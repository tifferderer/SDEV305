<?php
/**login.php
 * Tiffany Ferderer
 * 11/25/2020
 * Login form for demo purposes
 */

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

//var_dump($_POST);

//set an error flag
$err = false;

$username = "";

//if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "Form submitted";

    //get the username and pass
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //if correct
    //actual username and password need to be stored in a separate file
    require($_SERVER['HOME'] . '/logincreds.php');
    //should be moved to home directory above html

    if($username == $adminUser && $password == $adminPassword) {

        $_SESSION['loggedin'] = true;

        //redirect to index
        header("location: admin.php");
    }

    $err = true;
}
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

<div class="container">

    <h1>Login Page</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username"
                   name="username" <?php echo "value='$username'" ?> >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>

        <?php
        if($err) {
            echo'<span class="err">Incorrect login</span><br>';
        }
        ?>

        <!--
        <?php if($err) : ?>
        <span class="err">Incorrect login</span><br>
        <?php endif; ?>
        -->

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>


<footer class="jumbotron jumbotron-fluid text-right" style="margin-bottom:0">
    <nav class="nav d-inline">
        <div class="navbar-collapse justify-content-end mr-5">
            <ul class="navbar-nav text-right">
                <li class="nav-item inline float-right">
                    <a class="nav-link text-dark" href="#">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="https://tferderer.greenriverdev.com/SDEV305/portfolioproject/guestbook.html">Guestbook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="https://tferderer.greenriverdev.com/SDEV305/portfolioproject/admin.php">Admin</a>
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
