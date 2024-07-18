<?php
include_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `user_register` WHERE `email`=? AND `password`=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['login'] = $row['id'];	
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login / Sign Up!</title>
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
	<link rel="stylesheet" type="text/css" href="./fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/maincss.css  ">
	<link rel="stylesheet" type="text/css" href="./css/util.css">
	<link rel="stylesheet" type="text/css" href="./css/dashboard.css">
	<!--===============================================================================================-->
	<style>
		#login-container {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			background-color: #cdc1ff;
			background-image: linear-gradient(316deg, #cdc1ff 0%, #e5d9f2 74%);
			height: 100%;
		}

		#all {
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
	<title>Login to Yami Beads! </title>
</head>

<!-- breadcrumb -->
<div class="" id="login-container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg">
		<a href="index.php" class="logo_login">
			<img src="images/icons/logo-01.png" alt="IMG-LOGO">
		</a>
	</div>


	<div class="login_text">
		<h4 class="p-b-15 ltext-108 cl2 trans-04">
			LOGIN / REGISTER
		</h4>

		<p class="stext-117 cl6">
			Enjoy a personalised shopping experience
		</p>
	</div>


	<!-- Shoping Cart -->
	<div id="form-container">
		<form method="post">
			<div class="p-t-25">
				<div class="col-12 p-b-5">
					<label class="stext-102 cl3" for="email">Email</label>
					<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="email" name="email" required>
				</div>

				<div class="col-12 p-b-30">
					<label class="stext-102 cl3" for="email">Password</label>
					<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="password" name="password"
						required>
				</div>

				<div class="col-sm-12 p-b-5 button_login_flex">
					<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10"
						name="login">
						Login
					</button>
				</div>

				<label class="stext-102 cl3 text-center">--- OR ----</label>

				<div class="login_flex">
					<small style="font-size: 13px">New to Yami Beads ? </small>&nbsp;&nbsp;
					<a href="register.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register"
						name="review_submit" id="review_count">Create an account</a>
				</div>
			</div>
		</form>
	</div>
</div>