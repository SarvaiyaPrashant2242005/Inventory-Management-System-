<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: login_page.php");
    exit();
}

// Check if logout button is clicked
if (isset($_POST['logout'])) {
    // Destroy session and redirect to login page
    session_destroy();
    header("Location: Login_Page (1).html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch user information based on username
$username = $_SESSION['username'];
$query = "SELECT * FROM login WHERE Username = '$username'";

// Execute the query
$result = $connection->query($query);

// Check if query executed successfully
if ($result) {
    // Check if user exists
    if ($result->num_rows > 0) {
        // Fetch user details
        $row = $result->fetch_assoc();
        
        // Display user information
        $username = $row['Username'];
        $email = $row['Email'];
        $department = $row['Department'];
        $phone_no = $row['Phone_No'];
    } else {
        echo "User not found.";
    }
} else {
    echo "Error: " . $connection->error;
}

// Check if the update form is submitted
if (isset($_POST['update'])) {
    $new_email = $_POST['email'];
    $new_department = $_POST['department'];
    $new_phone_no = $_POST['phone_no'];

    // Update user details in the database
    $update_query = "UPDATE login SET Email = '$new_email', Department = '$new_department', Phone_No = '$new_phone_no' WHERE Username = '$username'";

    if ($connection->query($update_query) === TRUE) {
        echo "Record updated successfully";
        // Refresh the page to show updated details
        header("Refresh:0");
    } else {
        echo "Error updating record: " . $connection->error;
    }
}

// Close database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="mainpage.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e80601fab7.js" crossorigin="anonymous"></script>

    <form action="User_Homepage.php" method="POST">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid" id="navbar">
                <a class="navbar-brand" href="#">
                    <img src="ict_logo.png" alt="ict" width="60" height="50">
                </a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <?php include 'USER_SIDEBAR.php'; ?>

        <div class="container">
            <h2 class="text-center my-4">User Profile</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p><strong>Username:</strong> <?php echo $username; ?></p>
                            <p><strong>Email:</strong> <?php echo $email; ?></p>
                            <p><strong>Department:</strong> <?php echo $department; ?></p>
                            <p><strong>Phone No:</strong> <?php echo $phone_no; ?></p>
                            <form method="post">
                                <button type="submit" name="logout" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                            </form>
                            <button class="btn btn-primary" onclick="document.getElementById('edit-form').style.display='block'">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" id="edit-form" style="display:none;">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit Profile</h3>
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department:</label>
                                    <input type="text" name="department" id="department" class="form-control" value="<?php echo $department; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_no">Phone No:</label>
                                    <input type="text" name="phone_no" id="phone_no" class="form-control" value="<?php echo $phone_no; ?>" required>
                                </div>
                                <button type="submit" name="update" class="btn btn-success mt-3">Save Changes</button>
                                <button type="button" class="btn btn-secondary mt-3" onclick="document.getElementById('edit-form').style.display='none'">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
