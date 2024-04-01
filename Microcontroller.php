<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="mainpage.css">
</head>

<body>
    <form action="User_Homepage.php" method="POST">
        <nav class="navbar navbar-expand-lg bg-dark">
            <input type="checkbox" id="checkbox">
            <div class="side-nav-btn px-2 py-2 me-3 text-dark">
                <label for="checkbox">
                    <i class="fa-solid fa-bars" style="color: white;"></i>
                </label>

            </div>
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
    </form>
    <h1>This is a Microcontrollar page</h1>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            require_once('DB.php');

            $sql = "SELECT * FROM my_project";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<br>';
                    echo '<table class="table"><thead class="thead-dark">
                            <tr>
                                <th>Sr. No.</th>
                                <th>Component</th>
                                <th>Quantities</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                    $sr = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $sr++; ?></td>
                            <td><?php echo $row['componet']; ?></td>
                            <td><?php echo $row['quantities']; ?></td>
                            <td>
                                <a href="request_page.php?component=<?php echo urlencode($row['componet']); ?>" class="btn btn-primary">Request</a>
                            </td>
                        </tr>
                        <?php
                    }
                    echo '</tbody></table>';
                } else {
                    echo "No components found.";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>

</html>