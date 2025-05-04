<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user input from form
$title = $_POST['title'];
$image = $_POST['image'];
$description = $_POST['description'];

// Insert new card into database
$sql = "INSERT INTO cards (title, image, description) VALUES ('$title', '$image', '$description')";
if ($conn->query($sql) === TRUE) {
  echo "New card added successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?><?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user input from form
$title = $_POST['title'];
$image = $_POST['image'];
$description = $_POST['description'];

// Insert new card into database
$sql = "INSERT INTO cards (title, image, description) VALUES ('$title', '$image', '$description')";
if ($conn->query($sql) === TRUE) {
  echo "New card added successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>