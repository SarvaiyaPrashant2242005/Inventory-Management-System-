<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "components inventory";  // Add your database name here

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to this database is failed due to.. " . mysqli_connect_error());
    }

    // echo "Successful";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve values from the form
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $userPassword = isset($_POST['password']) ? $_POST['password'] : '';
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Update the SQL query to fix the typo and use correct variables
        $sql = "INSERT INTO `login` (`Email`, `Password`) VALUES ('$name', '$hashedPassword')";

        // Execute the query
        $result = mysqli_query($con, $sql);

        // Check if the query was successful
        if ($result) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Form not submitted.";
    }

    // Close the connection
    mysqli_close($con);
?>
