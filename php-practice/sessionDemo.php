<?php

//Error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//set session
session_start();
$_SESSION['first'] = "Daffy";
$_SESSION['last'] = "Duck";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Demo</title>
</head>
<body>
<h1>Session Demo</h1>

</body>
</html
