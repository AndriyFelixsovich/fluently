<?php

session_start();

if(!isset($_SESSION['user'])) header('location: login.php');

$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/77cd4ede27.js" crossorigin="anonymous"></script>

</head>
<body>


<div id="dashboardMainContainer">
    <?php include ('partials/app-sidebar.php')?>
    <div class="dashboard_content_content" id="dashboard_content_content">
        <?php include ('partials/app-topnav.php')?>
        <div class="dashboard_content">
            <div class="dashboard_content_main">
            </div>
        </div>
    </div>
</div>
<script src="js/dashboard.js"></script>
</body>
</html>