
<?php
/* confirmation.php
 * Gets data from pizza/index.php
 * 10/26/2020
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//header file
include ('includes/head.html');
require ('includes/dbcreds.php');
?>

<body>

<pre class="container" id="main">

    <!-- Jumbotron header -->
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Poppa's Pizza</h1>
        <p class="lead">Serving the Green River community since 1970!</p>
    </div>

    <?php
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $size = $_POST['size'];
        $toppings = implode(", ", $_POST['toppings']);
        $method = $_POST['method'];
        $fromName = $fname . " " . $lname;
        $fromEmail = "tifferderer@yahoo.com";

    //calculate pizza price
    $toppingsCount = count($_POST['toppings']);
    define('TAX_RATE', 0.1);
    if($size == 'small') {
        $price = 10.0;
    } elseif($size == 'medium') {
        $price = 15.0;
    } elseif ($size =='large') {
        $price = 20.0;
    } else {
        $price = 25.0;
    }

    //Add 50 cents to the price
    $price += $toppingsCount * 1.5;

    //add sales tax to the price
    $price += $price *TAX_RATE;
    //format price
    $price = number_format($price, 2);

    //save order to database
    $sql = "INSERT INTO pizza(`fname`, `lname`, `address`, `size`, `toppings`, `method`, `price`) VALUES
 ('$fname', '$lname', '$address', '$size', '$toppings', '$method', '$price')";

    $success = mysqli_query($cnxn, $sql);
    if(!$success) {
        echo "<p>Sorry something went wrong </p>";
        return;
    }
  ?>
    <h1>Thank you for your order, <?php echo $fname; ?>!</h1>
    <h2>Order Summary</h2>
    <?php
    //Print order summary
        echo "<p>Name:  $fname $lname</p>";
        echo "<p>Address: $address </p>";
        echo "<p>Size: $size</p>";
        echo "<p>Toppings: $toppings</p>";
        echo "<p>Method: $method</p>";
        echo "<p>Price: $$price</p>";
        //send email
        $fromName = "";


        $to = "";
        $subject = "Pizza Order Placed";
        $message = "Order from $fname $lname \r\n";
        $headers = "Name: $fromName <$fromEmail>";

        $success = mail($to, $subject, $message, $headers);

        //check
        if($success) {
            echo "<p>Your order has been placed.</p>";
        } else {
            echo "<p>Sorry, there was a problem. </p>";
        }

    //Shortcut
    echo $success ? "<p>Your order has been placed.</p>" :
        "<p>Sorry... there was a problem.</p>";

        ?>


    <pre
    <?php
        //var_dump($_POST);
    ?>
    </pre>
</div>
</body>
</html>

