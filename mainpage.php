<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         #microcontroller {
    box-shadow: 10px 5px 5px rgb(116, 112, 112);
    padding-top: 2px;
}

#sensor {
    box-shadow: 10px 5px 5px rgb(116, 112, 112);
    padding-top: 2px;

}

#drone {
    box-shadow: 10px 5px 5px rgb(116, 112, 112);
    padding-top: 2px;
}

#electronic-items {
    box-shadow: 10px 5px 5px rgb(116, 112, 112);

}

#microcontroller-btn:hover {
    border-color: black;
    border-width: 2px;

}

#sensor-btn:hover {
    border-color: black;
    border-width: 2px;
}

#drone-btn:hover {
    border-color: black;
    border-width: 2px;
}

#electronic-btn:hover {
    border-color: black;
    border-width: 2px;
}

.side-nav-btn {

    font-size: 1.5rem;
    display: flex;
    justify-content: center;
    align-items: center;

}

.side-nav-btn:hover {
    background-color: rgb(0, 0, 0, 0.3);
    border-radius: 30%;

}

.sidebar-menu {
    position: absolute;
    left: 0 px;
    width: 250px;
    height: 100vh;
    box-shadow: rgb(0, 0, 0, 0.5);
    background-color: rgb(34, 34, 34, 1);
    border-top: 1px solid white;

}

.side-content {
    color: white;
    width: 230px;
    margin-right: 10px;
    margin-top: 10px;
    margin-left: 10px;
}

.list {
    list-style: none;
    margin: 0px;
    padding: 0px;
    height: 100%;
}

.item {
    display: flex;
    align-items: center;
    height: 50px;
}

.item:hover {
    background-color: rgb(255, 255, 255, 0.3);
    border-radius: 10px;
}

.item i {
    font-size: 20px;
    height: 20px;
    width: 20px;
    margin-right: 15px;
    margin-left: 10px;
    text-align: center;
    line-height: 25px;

}

.item span {
    width: 120px;
    text-transform: capitalize;
}

.item a {
    color: white;
    text-decoration: none;
}

.cross-btn {
    color: grey;
    font-size: 25px;
    line-height: 60px;
    position: absolute;
    left: 200px;
}

.cross-btn i:hover {
    font-size: 30px;
}

#checkbox {
    display: none;

}

#checkbox:checked .sidebar-menu {
    left: 0;
}

.main-display {
    position: absolute;
    left: 250px;
    width: calc(100%-300px);
}
        /* Add animation keyframes */
        @keyframes scale {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        /* Add animation for button hover */
        .btn:hover {
            animation: scale 0.3s ease alternate forwards;
        }

        /* Add animation for card hover */
        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        /* Rest of your CSS styles... */
    </style>
</head>

<body>

<form action="User_Homepage.php" method="POST">
        <nav class="navbar navbar-expand-lg bg-dark">
            <input type="checkbox" id="checkbox">
            <div class="side-nav-btn px-2 py-2 me-3 text-dark">
        

            </div>
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
                <span class="navbar-text text-white">
                    
                </span>
            </div>
        </nav>

        <div class="sidebar-menu">
            <div class="side-content">
                <ul class="list">
                    <li class="item">
                        <i class="fa-solid fa-house"></i>
                        <span>
                            <a href="mainpage.php"> Home</a>
                        </span>
                    </li>
                    <li class="item">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>
                            <a href="Request.php">Request</a>
                        </span>
                    </li>
                    <li class="item">
                        <i class="fa-solid fa-phone"></i>
                        <span>
                            <a href="Contact_us.php">Contact us</a>
                        </span>
                    </li>

                    <li class="item">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>
                            <a href="About_us.php">About us</a>
                        </span>
                    </li>
                    <li class="item">
                        <i class="fa-solid fa-user-circle"></i>
                        <span><a href='Accounnt.php'>Account</a></span>
                        
                    </li>
                </ul>
            </div>
        </div>
    <div class="main-display">
        <div id="card">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" id="microcontroller" style="width: 25rem;">
                            <img src="microcontroller.jpg" class="card-img-top" alt="Microcontroller"
                                height="216.81px">
                            <div class="card-body">
                                <h5 class="card-title">Microcontroller</h5>
                                <br>
                                <a href="Microcontroller.php" class="btn btn-primary"
                                    id="microcontroller-btn">Microcontroller</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" id="sensor" style="width: 25rem; ">
                            <img src="sensor.png" class="card-img-top" alt="Sensors" height="216.81px">
                            <div class="card-body">
                                <h5 class="card-title">Sensors</h5>
                                <br>
                                <a href="Sensors.php" class="btn btn-primary" id="sensor-btn">Sensor</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card" id="drone" style="width: 25rem; ">
                            <img src="drone.jpg" class="card-img-top" alt="drone components"
                                height="216.81px">
                            <div class="card-body">
                                <h5 class="card-title">Drone components</h5>
                                <br>
                                <a href="drone.php" class="btn btn-primary" id="drone-btn">Drone
                                    components</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" id="electronic-items" style="width: 25rem;">
                            <img src="electronic-item.jpg" class="card-img-top" alt="Electronic item"
                                height="216.81px">
                            <div class="card-body">
                                <h5 class="card-title">Electronic items</h5>
                                <br>
                                <a href="Electonics.php" class="btn btn-primary"
                                    id="electronic-btn">Electronic items</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
