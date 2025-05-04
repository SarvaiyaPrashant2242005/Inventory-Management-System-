<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables for error messages and form data
$alert_message = "";
$username = $email = $department = $phone_no = $password = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $phone_no = $_POST['Phone_No'];
    $password = $_POST['password'];

    // Database configuration
    $host = "localhost";
    $user = "root";
    $password_db = "";
    $database_name = "login";

    // Create connection
    $conn = new mysqli($host, $user, $password_db, $database_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM login WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists
        $alert_message = "Username already exists. Please choose a different username.";
    } else {
        // Insert new user into the database using prepared statement
        $stmt = $conn->prepare("INSERT INTO login (Username, Email, Department, Password, Phone_No) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $email, $department, $password, $phone_no);
        if ($stmt->execute()) {
            $alert_message = "User added successfully.";
        } else {
            $alert_message = "Error adding user: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            background-image: url("Login_bg.png");
            background-size: cover;
            background-position: center;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: fadeInBackground 2s ease-in-out;
        }

        @keyframes fadeInBackground {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .outer {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            margin-bottom: 20px;
            color: #333333;
            animation: slideInFromLeft 0.5s ease-in-out;
        }

        @keyframes slideInFromLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .inner {
            text-align: left;
            animation: fadeIn 1s ease-in-out;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
            animation: fadeIn 1.2s ease-in-out;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            animation: slideInFromRight 1.5s ease-in-out;
        }

        @keyframes slideInFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .inner br {
            display: none;
        }

        @media (max-width: 480px) {
            .outer {
                padding: 15px;
            }

            input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="outer">
        <h1>Sign Up</h1>
        <?php
            if (!empty($alert_message)) {
                echo "<script>alert('$alert_message');</script>";
            }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="inner">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">Email id:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" required>
                
                <label for="Phone_No">Phone No:</label>
                <input type="tel" id="Phone_No" name="Phone_No" pattern="[0-9]{10}" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
            </div>
            <div>
                <input type="submit" value="Sign Up" id="submit">
            </div>
        </form>
        <div>
            <p>Already have an account? <a href="Login_page.php">Log in here</a>.</p>
        </div>
    </div>
</body>
</html>
