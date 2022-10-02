<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
<div style="text-align: center;">
    <?php

    // servername => localhost
    // username => root
    // password => empty
    // database name => staff
    $conn = mysqli_connect("mysqldb", "root", "root", "mysqldatabase");

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    // Taking all 5 values from the form data(input)
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $service = $_REQUEST['service'];
    $message = $_REQUEST['message'];

    echo $name . "<br>";
    echo $email . "<br>";
    echo $service . "<br>";
    echo $message . "<br>";
    // Performing insert query execution
    $sql = "INSERT INTO requests VALUES ('$email','$name','$service','$message')";

    if(mysqli_query($conn, $sql)){
        echo "<h1>Thank you for your request!</h1>";

    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    ?>
</div>
</body>

</html>
