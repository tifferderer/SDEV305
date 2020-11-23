<?php
//Error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Participate in session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Demo</title>
</head>
<body>
<h1>Session Demo</h1>

<?php
echo"<p>Hello, " . $_SESSION['first'] ." ". $_SESSION['last']."</p>";
?>
