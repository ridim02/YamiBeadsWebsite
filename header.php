<?php include_once 'connection.php';

if (isset($_SESSION['login'])) {
	$login_id = $_SESSION['login'];
	$sql_select_login = "select * from `user_register` where `id`='$login_id'";
	$data_login = mysqli_query($conn, $sql_select_login);
	$row_login = mysqli_fetch_assoc($data_login);

	$sql_select_cart = "select * from `cart` where `user_id`='$login_id'";
	$data_cart = mysqli_query($conn, $sql_select_cart);

	$amt_total = "select * from `cart` where `user_id`='$login_id'";
	$data_total = mysqli_query($conn, $amt_total);

	$total_price = 0;
	while ($row_total = mysqli_fetch_assoc($data_total)) {
		$total_price = $total_price + $row_total['price'] * $row_total['num_product'];
	}

	$data_count = mysqli_num_rows($data_total);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
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

<body>
	<div id="header-container" data-aos="fade-down" data-aos-duration="1000">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<a href="dashboard.php" class="logo" data-aos="fade-right" data-aos-duration="1000">
						<img src="./images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop" data-aos="fade-left" data-aos-duration="1000">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="dashboard.php">Home</a>
							</li>
							<li>
								<a href="product.php">Shop</a>
							</li>
							<li class="label1" data-label1="hot">
								<a href="cart.php">Shopping Cart</a>
							</li>
							<li>
								<a href="about.php">About</a>
							</li>
							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</div>

					<div class="wrap-icon-header flex-w flex-r-m" id="cart_data_count">
						<div class="menu-desktop" data-aos="fade-left" data-aos-duration="1000">
							<ul class="main-menu">
								<?php if (isset($_SESSION['login'])) { ?>
									<a style="color: #b2b2b2;" class="flex-c-m trans-04 p-lr-25" style="font-family: Poppins-Regular; font-size: 14px; line-height: 1.5;">
										Hello... <?php echo $row_login['name']; ?>!
									</a>
								<?php } else { ?>
									<a href="login.php" class="flex-c-m trans-04 p-lr-25" style="font-family: Poppins-Regular; font-size: 14px; line-height: 1.5;">
										Login / Sign-in
									</a>
								<?php } ?>
								<li>
									<h3><a><i class="zmdi zmdi-account-circle"></i></a></h3>
									<ul class="sub-menu">
										<li><a href="cart.php"><i class="zmdi zmdi-shopping-cart"></i> | My Cart</a>
										</li>
										<li><a href="orders.php"><i class="zmdi zmdi-collection-bookmark"></i> | My
												Orders</a></li>
										<li><a href="logout.php"><i class="zmdi zmdi-open-in-new"></i> | Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>

</html>