
<div class="sidebar">
    <br>
    <br>
    <a href='Admin_Homepage.php'>Home</a>
    <a href='Add_Microcontrollar.php'>Microcontrollers</a>
    <a href='Add_Sensors.php'>Sensors</a>
    <a href='Add_Drone_components.php'>Drone Components</a>
    <a href='Add_Electronic_items.php'>Electronic Items</a>
    <a href='Add_Users.php'>Add Users</a>
    <a href='Users.php'>Users</a>
    <a href='M_request_page.php'>Requests</a>
</div>

<style>
    .sidebar {
        background-color: #232f3e;
        height: 100vh;
        width: 200px;
        position: fixed;
        top: 0;
        left: 0;
        padding-top: 50px;
        animation: slideInLeft 0.5s ease-out;
    }

    .sidebar a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #ffffff;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #f0f0f0;
        color: #111;
    }

    .sidebar a:last-child {
        margin-top: auto;
        margin-bottom: 20px;
    }

    @keyframes slideInLeft {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>