<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us</title>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <?php include 'NAVBAR.php'; ?>
        
        <?php include 'USER_SIDEBAR.php'; ?>

    <script src="https://kit.fontawesome.com/e80601fab7.js" crossorigin="anonymous"></script>
<style>
    .main-display {
    position: absolute;
    left: 250px;
    width: calc(100%-300px);
}
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }
    .container {
        display: flex;
        justify-content: space-around;
        margin: 20px;
    }
    .card {
        width: 300px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .card img {
        width: 100%;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .card h2 {
        font-size: 20px;
        margin-bottom: 10px;
    }
    .card p {
        font-size: 16px;
        line-height: 1.5;
    }
</style>
</head>
<body>

<div class="main-display">
<div class="container">
    <div class="card">
        <img src="Prashant.jpg" alt="Your Photo 1">
        <h2>Prashant Sarvaiya</h2>
        <p><b>Front hand developer</b></p>
        <p><b>Department</b> : ICT</p>
        <p><b>Semester</b>   : 4</p>
        <p><b>Contact </b>   : 9316163578</p>
        <p><b>E-mail  </b>   : prashanthere90@gmail.com</p>
    </div>
    <div class="card">
        <img src="Abhay.jpg" alt="Your Photo 2">
        <h2>Abhay Padariya</h2>
        <p><b>Backend developer</b></p>
        <p><b>Department</b> : ICT</p>
        <p><b>Semester</b>   : 4</p>
        <p><b>Contact </b>   : 9316163578</p>
        <p><b>E-mail  </b>   : abhaypadriya@gmail.com</p>
    </div>
</div></div>

</body>
</html>
