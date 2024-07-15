<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include_once("./header.php"); ?>

    <div class="flex-container">
        <div id="left-content" class="">
            <h1>Dashboard</h1>
            <p>Welcome to the dashboard</p>
            <p>Here you can view your orders, update your profile, and more!</p>
        </div>
        <div id="right-content" class="">
            <img src="./images/dashboard-ring.jpg" alt="dashboard-ring">
        </div>
    </div>
</body>
</html>
