<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
    <link rel="stylesheet" href="mainpage.css">

</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/e80601fab7.js" crossorigin="anonymous"></script>
    
  <form action="User_Homepage.php" method="POST">
      <nav class="navbar navbar-expand-lg bg-dark" >
        <input type="checkbox" id="checkbox">
           <div class="side-nav-btn px-2 py-2 me-3 text-dark" >
             <label for="checkbox" >
                <i class="fa-solid fa-bars" style="color: white;"></i>
             </label>
          
           </div>
        <div class="container-fluid" id="navbar">
            <a class="navbar-brand" href="#" >
                <img src="ict_logo.png" alt="ict"  width="60" height="50">
            </a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
           </form>
        </div>
      </nav>
      
      <div class="sidebar-menu">
        <div class="cross-btn">
          <label for="checkbox">
            <i class="fa-solid fa-xmark"> 
            </i>
          </label>
        </div>
        <br>
        <br>
        <div class="side-content">
          <ul class="list">
            <li class="item">
                <i class="fa-solid fa-house"></i>
              <span>
                <a href="#"> Home</a>
              </span>
            </li>
            <li class="item">
              <i class="fa-solid fa-cart-shopping"></i>
            <span>
              <a href="#">Request</a>
            </span>
          </li>
            <li class="item">
              <i class="fa-solid fa-phone"></i>
            <span>
              <a href="#">Contact us</a>
            </span>
          </li>
          <li class="item">
            <i class="fa-solid fa-clock-rotate-left"></i>
          <span>
            <a href="#">History</a>
          </span>
         </li>
          <li class="item">
          <i class="fa-solid fa-circle-exclamation"></i>
         <span>
          <a href="#">About us</a>
        </span>
      </li>
        

          </ul>
        </div>
      </div>
      <div class="main-display">
        <div id="card" >
          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                      <div class="card" id="microcontroller" style="width: 25rem;">
                          <img src="microcontroller.jpg" class="card-img-top" alt="Microcontroller" height="216.81px">
                          <div class="card-body">
                            <h5 class="card-title">Microcontroller</h5>
                            <br>
                            <a href="Microcontroller.html" class="btn btn-primary" id="microcontroller-btn">Microcontroller</a>
                          </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card"  id="sensor" style="width: 25rem; ">
                          <img src="sensor.png" class="card-img-top" alt="Sensors" height="216.81px">
                          <div class="card-body">
                            <h5 class="card-title">Sensors</h5>
                            <br>
                            <a href="Sensors.html" class="btn btn-primary" id="sensor-btn">Sensor</a>
                          </div>
                        </div>
        
                  </div>
                  <div class="col-md-4">
                      <div class="card" id="drone" style="width: 25rem; ">
                          <img src="drone.jpg" class="card-img-top" alt="drone components" height="216.81px">
                          <div class="card-body">
                            <h5 class="card-title">Drone components</h5>
                            <br>
                            <a href="Drone_components.html" class="btn btn-primary" id="drone-btn">Drone components</a>
                          </div>
                        </div>
        
        
                  </div>
              </div>
              <br>
              <br>
              <div class="row">
                <div class="col-md-4">
                  <div class="card" id="electronic-items" style="width: 25rem;">
                      <img src="electronic-item.jpg" class="card-img-top" alt="Electronic item" height="216.81px">
                      <div class="card-body">
                        <h5 class="card-title">Electronic items</h5>
                        <br>
                        <a href="Electronic_items.html" class="btn btn-primary" id="electronic-btn">Electronic items</a>
                      </div>
                    </div>
        
              </div>
              <br>
              <p> </p>
              <p>  </p>
        
          </div>
        
      </div>
      
    
    </form>
    

    
    

    
</body>
</html>