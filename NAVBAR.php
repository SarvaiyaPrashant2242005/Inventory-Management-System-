<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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
                    <?php
                        // Start the session
                        session_start();

                        // Check if the username is set in the session
                        if(isset($_SESSION['username'])) {
                            // Display the username with white color
                            echo "<span style='color: white;'>" . $_SESSION['username'] . "</span>";
                        } else {
                            // If the username is not set, display a default message with white color
                            echo "<span style='color: white;'>Welcome, Guest</span>";
                        }
                    ?>
                </form>
            </div>
        </nav>