<?php
/*
 * Tiffany Ferderer
 * admin.php
 * Dispay guest summary
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

include ('includes/dbcreds.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- CSS (Make sure Bootstrap is first) -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/resumestyles.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

        <title>Tiffany Ferderer</title>
    </head>

    <body>
        <div class="container min-vh-100" id="main">
            <h1 class="mt-4 mb-4">Order Summary</h1>
            <table id = "guest-table" class = "display">
                <thead>
                <tr>
                    <td>Guest ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Title</td>
                    <td>Company</td>
                    <td>LinkedIn</td>
                    <td>Email</td>
                    <td>Where Met</td>
                    <td>Other Meet</td>
                    <td>Message</td>
                    <td>Add to Mailing?</td>
                    <td>Mail Form</td>
                    <td>Submission Date</td>
                </tr>
                </thead>

                <tbody>

                <?php

                $sql = "SELECT * FROM guestbook";
                $result = mysqli_query($cnxn, $sql);
                //var_dump($result);

                foreach ($result as $row) {
                    //var_dump($row);
                    $guest_id = $row['guest_id'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $title = $row['title'];
                    $company = $row['company'];
                    $linkedin = $row['linkedin'];
                    $email = $row['email'];
                    $meet = $row['meet'];
                    $other = $row['other_meet'];
                    $message = $row['message'];
                    $add_mail = $row['add_mail'];
                    $mailing = $row['mailing'];
                    $guest_date = date("M d, Y g:i a",strtotime( $row['guest_date']));

                    echo "<tr>";
                    echo"<td>$guest_id</td>
                <td>$fname</td>
                <td>$lname</td> 
                <td>$title</td> 
                <td>$company</td> 
                <td>$linkedin</td> 
                <td>$email</td> 
                <td>$meet</td> 
                <td>$other</td> 
                <td>$message</td> 
                <td>$add_mail</td> 
                <td>$mailing</td> 
                <td>$guest_date</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>

            </table>
        </div>
    </body>

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
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="http://tferderer.greenriverdev.com/SDEV305/portfolioproject/admin.php">Directory</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </footer>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src ="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $('#guest-table').DataTable();
    </script>

    </body>
</html>