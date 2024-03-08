<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "user";

    $data = mysqli_connect($host, $user, $password, $database_name);
    if ($data === false) {
        die("Connection error");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM login WHERE Username = ? AND Password = ?";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            if ($row["Usertype"] == "user") {
                header("location:mainpage.php");
            } elseif ($row["Usertype"] == "admin") {
                header("location:Admin_Homepage.php");
            } else {
                echo "USERNAME OR PASSWORD INCORRECT";
            }
        } else {
            echo "USERNAME OR PASSWORD INCORRECT";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($data);
    }
?>
