<?php include_once 'connection.php'; ?>

<?php

if(isset($_SESSION['login']))
{
$login_id = $_SESSION['login'];
$sql_select_login = "select * from `user_register` where `id`='$login_id'";
$data_login = mysqli_query($conn,$sql_select_login);
$row_login = mysqli_fetch_assoc($data_login);
}
else
{
	header('location:login_home.php');
}

 ?>

<html lang="en">
<head>
	<title>Your order has been cancelled!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/maincss.css  ">
	<link rel="stylesheet" type="text/css" href="./css/util.css">
	<link rel="stylesheet" type="text/css" href="./css/dashboard.css">
	<!--===============================================================================================-->

</head>
<body class="animsition">

	<div class="order_placed">
		<h1>Your order has been cancelled successfully....</h1>
		<h3>Note: If alreay paid then payment will be refunded within 7 working days...</h3>
	</div>

	<form method="post">
	<div class="flex-w button">
		<a href="index.php" class="flex-c-m stext-101 cl0 size-104 bg3 bor14 hov-btn3 m-r-5 p-lr-15 m-t-15 trans-04 pointer" name="yes">
			Back to Home
		</a>
	</div>
	<div class="flex-w button">
		<a href="order-list.php" class="flex-c-m stext-101 cl0 size-104 bg3 bor14 hov-btn3 m-r-5 p-lr-15 m-t-15 trans-04 pointer" name="yes">
			Back to Your Order List
		</a>
	</div>
	</form>

	<?php include_once 'scripts.php'; ?>
