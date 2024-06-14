<?php include 'Admin_Sidebar.php'; ?>
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "login";

    $data = mysqli_connect($host, $user, $password, $database_name);
    if ($data === false) {
        die("Connection error");
    }

    // Initialize alert message variable
    $alert_message = "";

    // Check if form is submitted for adding a user
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $password = $_POST['password'];
        $contact = $_POST['Contact'];
        $usertype = $_POST['usertype']; // Assuming you have a select dropdown for user type

        // Check if username already exists
        $check_query = "SELECT * FROM login WHERE Username = '$username'";
        $check_result = mysqli_query($data, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            // Username already exists
            $alert_message = "Username already exists. Please choose a different username.";
        } else {
            // Insert new user into the database
            $insert_query = "INSERT INTO login (Username, Email, Department, Password, Phone_No, Usertype) VALUES ('$username', '$email', '$department', '$password', '$contact','$usertype')";
                if (mysqli_query($data, $insert_query)) {
                // Set alert message
                $alert_message = "User added successfully.";
            } else {
                $alert_message = "Error adding user: " . mysqli_error($data);
            }
        }

        mysqli_close($data);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    
    <?php include 'Admin_Sidebar.php'; ?>
    
    <style>
        /* Adjust main content styles */
        .main-content {
            margin-left: 200px; /* Width of the sidebar */
            padding: 20px;
            width: calc(100% - 200px); /* Take up remaining width */
            background-color: #f9f9f9;
            border-left: 1px solid #ccc;
        }

        /* Form styles */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[Type="tel" ],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensure padding and border are included in the element's total width and height */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="content-container">
        <div class="main-content">
            <?php
                // Display alert message if set
                if (!empty($alert_message)) {
                    echo "<script>alert('$alert_message');</script>";
                }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br><br>
                
                <label for="email">Email:</label>
                <input type="email" name="email" required><br><br>
                
                <label for="department">Department:</label>
                <input type="text" name="department" required><br><br>
                
                <label for="password">Password:</label>
                <input type="password" name="password" required><br><br>
                
                <label for="Contact">Contact : </label>
                <input type="tel" id="phone" name="Contact" required> 
                <br><br>


                <label for="usertype">User Type:</label>
                <select name="usertype">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select><br><br>
                
                <input type="submit" name="add_user" value="Add User">
            </form>
        </div>
    </div>
</body>
</html>
