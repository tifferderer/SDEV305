<?php
//Error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//header, setcookie have to come before any html output
//including comments and white space
setcookie("last", "Mouse");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie Demo</title>
</head>
<body>
<h1>Cookie Demo</h1>

<?php
    echo"<p>Hello, " . $_COOKIE['first'] ." ". $_COOKIE['last']."</p>";
?>


</body>
</html