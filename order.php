<?php include_once 'connection.php'; ?>

<?php 

if(isset($_SESSION['login']))
{
	$login_id = $_SESSION['login'];
	$sql_select_login = "select * from `user_register` where `id`='$login_id'";
	$data_login = mysqli_query($conn,$sql_select_login);
	$row_login = mysqli_fetch_assoc($data_login);

	$sql_select_status = "select * from `order` where `status`='placed'";
	$data_status = mysqli_query($conn,$sql_select_status);
	$row_status = mysqli_num_rows($data_status);

	if($row_status>0)
	{
		$sql_select = "select * from `order` where `user_id`='$login_id' and `status`='placed'";
		$data = mysqli_query($conn,$sql_select);

		$sql_select_o = "select * from `order` where `user_id`='$login_id' and `status`='placed'";
		$data_o = mysqli_query($conn,$sql_select_o);
		$row_o = mysqli_fetch_assoc($data_o);

		$amt_total = "select * from `order` where `user_id`='$login_id' and `status`='placed'";
		$data_total = mysqli_query($conn,$amt_total);

		$total_price = 0;
		while($row_total = mysqli_fetch_assoc($data_total))
		{
			$total_price = $total_price + $row_total['price'] * $row_total['num_product'];
		}

		$sql_select_r = "select * from `user_register` where `id`='$login_id'";
		$data_r = mysqli_query($conn,$sql_select_r);
		$row_r = mysqli_fetch_assoc($data_r);

		$sql_select_pay = "select `payment` from `order` where `user_id`='$login_id' and `status`='placed'";
		$data_pay = mysqli_query($conn,$sql_select_pay);
		$row_pay = mysqli_fetch_assoc($data_pay);

		if ($row_pay['payment']=='Cash on Delivery')
		{
			$payment_status = 'CASH ON DELIVERY';
		}
		else
		{
			$payment_status = 'PAID';
		}

		$sql_update = "update `order` set `status`='Pending' where `user_id`='$login_id' and `status`='placed'";
		mysqli_query($conn,$sql_update);
	}
	else
	{
		header('location:order-list.php');
	}


	if (isset($_POST['list']))
	{	
		header('location:order-list.php');
	}
}
else
{
	header('location:login.php');
}



 ?>

<!-- breadcrumb -->
<html lang="en">
<head>
	<title>Order Here!</title>
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

	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-15 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="shoping-cart.php" class="stext-109 cl8 hov-cl1 trans-04">
				Shoping Cart
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Your Order-list
			</span>
		</div>
	</div>

	<div class="order_placed">
		<h1>Congratulations.... Your Order Has Been Placed...</h1>
		<h3>Product has been delivered within given time period, Please refer details below..</h3>
	</div>

	<!-- Shoping Cart -->
<div id="new_number_of_product">
	<form class="bg0 p-t-45 p-b-85" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart" align="center">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

						<?php if(isset($_SESSION['login']))
						{
						while($row = mysqli_fetch_assoc($data)) { ?>
								<tr class="table_row">
									<td class="column-1" align="center">
										<div class="how-itemcart1">
											<img src="./assets/<?php echo $row['image']; ?>">
										</div>												
									</td>
									<td class="column-2">
										<div class="p-b-10"><?php echo $row['name']; ?></div>
									</td>
									<td class="column-3">Rs.<?php echo $row['price']; ?></td>
									<td class="column-4" align="center">
										<span class="num_pro"><?php echo $row['num_product']; ?></span>
									</td>
									<td class="column-5">
										<?php 

											$total_pro = $row['num_product'];
											$price = $row['price'];

											echo 'Rs.'.$total_pro*$price;
										 ?>
									</td>
									<td>
										
									</td>
								</tr>
						<?php } } ?>

							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class=" m-r-20 m-tb-5">
								<div class="order_text cl2 m-b-20 m-t-15"><b>Product to be delivered at : </b> <?php echo $row_o['address']; ?>, <?php echo $row_o['city']; ?>, <?php echo $row_o['pincode']; ?></div>

								<div class="order_text cl2 m-b-20"><b>Ordered By : </b> <?php echo $row_o['cust_name']; ?></div>
								<div class="order_text cl2 m-b-20"><b>Mobile No : </b> <?php echo $row_o['mobile']; ?></div>
								<div class="order_text cl2 m-b-40"><b>Email ID : </b> <?php echo $row_o['email']; ?></div>
							

							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-50">
							Total Amount
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2 ">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php if(isset($_SESSION['login'])) { ?>
										Rs.<?php echo $total_price; ?>
									<?php }
									else {
										echo "Rs.0";
									} ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Rs. 0
								</p>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php if(isset($_SESSION['login'])) { ?>
										Rs.<?php echo $total_price; ?>
									<?php }
									else {
										echo "Rs.0";
									} ?>
								</span>
							</div>
						</div>

						<div class="p-b-13">
							<h1 class="payment_status"><?php echo $payment_status; ?></h1>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 m-t-50 trans-04 pointer" name="list">
							Go To Your Order-List
						</button>
						
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


	<?php include_once 'footer.php'; ?>

	<?php include_once 'scripts.php'; ?>
