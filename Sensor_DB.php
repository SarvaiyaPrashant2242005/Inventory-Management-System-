<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "admin");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt insert query execution
$sql = "CREATE TABLE IF NOT EXISTS Sensors (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    componet VARCHAR(50) NOT NULL,
    quantities VARCHAR(50) NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 1
)";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>