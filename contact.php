<?php include_once 'connection.php'; ?>
<?php include_once 'header.php'; ?>
<?php 

if (isset($_POST['submit_msg']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	date_default_timezone_set('Asia/Kathmandu');
	$time = date('Y-m-d H:i:s');

	$sql_insert = "insert into `contact_us`(`name`,`email`,`msg`,`time`)values('$name','$email','$msg','$time')";
	mysqli_query($conn,$sql_insert);
}

 ?>
<html lang="en">
<head>
	<title>Contact Us!</title>
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/maincss.css  ">
	<link rel="stylesheet" type="text/css" href="./css/util.css">
	<link rel="stylesheet" type="text/css" href="./css/dashboard.css">
	<!--===============================================================================================-->

</head>
<body>
	<!-- Title page -->
		<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('./images/bg.jpg');">
			<h2 class="ltext-105 cl0 txt-center">
				Contact
			</h2>
		</section>	
	
	
		<!-- Content page -->
		<section class="bg0 p-t-104 p-b-116">
			<div class="container">
				<div class="flex-w flex-tr">
					<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<form method="post">
							<h4 class="mtext-105 cl2 txt-center p-b-30">
								Send Us A Message
							</h4>
	
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Your Name" required maxlength="20">
								<img class="how-pos4 pointer-none" src="images/icons/icon-heart-01.png" alt="ICON">
							</div>
	
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Your Email Address" required maxlength="25">
								<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
							</div>
	
							<div class="bor8 m-b-30">
								<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?" required maxlength="500"></textarea>
							</div>
	
							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="submit_msg">
								Submit
							</button>
						</form>
					</div>
	
					<div class="size-210 bor10 flex-w flex-col-m p-lr-90 p-tb-30 p-lr-15-lg w-full-md">
						<div class="flex-w w-full p-b-42">
							<span class="fs-18 cl5 txt-center size-211">
								<span class="lnr lnr-map-marker"></span>
							</span>
	
							<div class="size-212 p-t-2">
								<span class="mtext-110 cl2">
									Address
								</span>
	
								<p class="stext-115 cl6 size-213 p-t-18">
									Labim Mall 4th floor, Pulchowk, Lalitpur, Nepal
									(This website is not live, its made for learning purpose only, <br>
									email : 020bscit020@sxc.edu.np | 020bscit029@sxc.edu.np)
								</p>
							</div>
						</div>
	
						<div class="flex-w w-full p-b-42">
							<span class="fs-18 cl5 txt-center size-211">
								<span class="lnr lnr-phone-handset"></span>
							</span>
	
							<div class="size-212 p-t-2">
								<span class="mtext-110 cl2">
									Lets Talk
								</span>
	
								<p class="stext-115 cl1 size-213 p-t-18">
									+1 234 567890
								</p>
							</div>
						</div>
	
						<div class="flex-w w-full">
							<span class="fs-18 cl5 txt-center size-211">
								<span class="lnr lnr-envelope"></span>
							</span>
	
							<div class="size-212 p-t-2">
								<span class="mtext-110 cl2">
									Sale Support
								</span>
	
								<p class="stext-115 cl1 size-213 p-t-18">
									contact@example.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	<?php include_once 'footer.php'; ?>
	
	
	<?php include_once 'scripts.php'; ?>
</body>
</html>