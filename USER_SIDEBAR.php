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
        
        <style>

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
left: 0 px;
width: 250px;
height: 100vh;
box-shadow: rgb(0, 0, 0, 0.5);
background-color: rgb(34, 34, 34, 1);
border-top: 1px solid white;
position: fixed;


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
</style>