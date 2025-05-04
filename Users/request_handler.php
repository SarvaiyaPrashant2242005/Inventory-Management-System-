<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: login_page.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch user information based on username
$username = $_SESSION['username'];
$query = "SELECT * FROM login WHERE Username = '$username'";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if query executed successfully
if ($result) {
    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
        // Display user information
        $username = $row['Username'];
    } else {
        echo "User not found.";
    }
} else {
    // echo "Error: " . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>
<?php
// Include database connection
require_once('Microcontrollars_DB.php');
require_once('Sensor_DB.php');
require_once('Electronics_DB.php');
require_once('drone_DB.php');

// Check if component_name and quantity are provided
if (isset($_POST['component_name']) && isset($_POST['quantity'])) {
    // Escape user inputs for security
    $component_name = mysqli_real_escape_string($link, $_POST['component_name']);
    $quantity = mysqli_real_escape_string($link, $_POST['quantity']);

    // Check if the requested quantity is less than or equal to the available quantity in microcontrollers
    $sql = "SELECT * FROM microcontrollars WHERE componet = '$component_name'";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        // Found in microcontrollers database
        $row = mysqli_fetch_assoc($result);
        $available_quantity = $row['quantities'];
    } else {
        // Not found in microcontrollers, search in sensors database
        $sql = "SELECT * FROM sensors WHERE componet = '$component_name'";
        $result = mysqli_query($link, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            // Found in sensors database
            $row = mysqli_fetch_assoc($result);
            $available_quantity = $row['quantities'];
        } else {
            // Not found in either microcontrollers or sensors database, check in drone database
            $sql = "SELECT * FROM drone WHERE componet = '$component_name'";
            $result = mysqli_query($link, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                // Found in drone database
                $row = mysqli_fetch_assoc($result);
                $available_quantity = $row['quantities'];
            } else {
                // Not found in drone database, check in electronics database
                $sql = "SELECT * FROM electronics WHERE componet = '$component_name'";
                $result = mysqli_query($link, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    // Found in electronics database
                    $row = mysqli_fetch_assoc($result);
                    $available_quantity = $row['quantities'];
                } else {
                    // Component not found in any database
                    echo "ERROR: Component not found in any database.";
                    exit(); // Terminate script execution
                }
            }
        }
    }

    // Check if the requested quantity is less than or equal to the available quantity
    if ($quantity <= $available_quantity) {
        // Minus the quantity from available quantity
        $new_quantity = $available_quantity - $quantity;

        // Update the available quantity in the respective database
        if (isset($row['componet'])) {
            // Found in microcontrollers database
            $update_sql = "UPDATE microcontrollars SET quantities = '$new_quantity' WHERE componet = '$component_name'";
        } else {
            // Found in sensors or drone or electronics database
            $update_sql = "UPDATE " . key($row) . " SET quantity = '$new_quantity' WHERE component_name = '$component_name'";
        }

        if (mysqli_query($link, $update_sql)) {
            // Insert data into request table with the current date in DD-MM-YYYY format
            $insert_sql = "INSERT INTO request (account_holder_name, component_name, quantity, status, request_date) VALUES ('$username', '$component_name', '$quantity', 'Pending', NOW())";
            if (mysqli_query($link, $insert_sql)) {
                echo "Request submitted successfully.";
            } else {
                echo "ERROR: Could not able to execute $insert_sql. " . mysqli_error($link);
            }
        } else {
            echo "ERROR: Could not update available quantity. " . mysqli_error($link);
        }
    } else {
        echo "ERROR: Requested quantity exceeds available quantity.";
    }
} else {
    echo "ERROR: component_name and quantity not provided.";
}

// Close database connection
mysqli_close($link);
?>
