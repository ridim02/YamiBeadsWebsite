<?php include_once 'connection.php'; ?>

<?php include_once 'header.php'; ?>

<?php

$_SESSION['short'] = 'default';

$sql_select_data = "select * from `product` where `stock`='In Stock'";
$data_data = mysqli_query($conn, $sql_select_data);

if (isset($_GET['search_product'])) {
	$search_pro = $_GET['search_product'];


	$sql_select_data = "select * from `product` where `stock`='In Stock' AND (`name` like '%$search_pro%' OR `category` like '%$search_pro%' OR `tag` like '%$search_pro%' OR `one_line_title` like '%$search_pro%' OR `size` like '%$search_pro%' OR `color` like '%$search_pro%' OR `description` like '%$search_pro%' OR `weight` like '%$search_pro%' OR `dimension` like '%$search_pro%' OR `material` like '%$search_pro%')";
	$data_data = mysqli_query($conn, $sql_select_data);

	if (isset($_SESSION['short'])) {
		if ($_SESSION['short'] == 'default') {
			$sql_select = "select * from `product` where `stock`='In Stock' AND (`name` like '%$search_pro%' OR `category` like '%$search_pro%' OR `tag` like '%$search_pro%' OR `one_line_title` like '%$search_pro%' OR `size` like '%$search_pro%' OR `color` like '%$search_pro%' OR `description` like '%$search_pro%' OR `weight` like '%$search_pro%' OR `dimension` like '%$search_pro%' OR `material` like '%$search_pro%') order by `id` asc";
		}
		if ($_SESSION['short'] == 'newness') {
			$sql_select = "select * from `product` where `stock`='In Stock' AND (`name` like '%$search_pro%' OR `category` like '%$search_pro%' OR `tag` like '%$search_pro%' OR `one_line_title` like '%$search_pro%' OR `size` like '%$search_pro%' OR `color` like '%$search_pro%' OR `description` like '%$search_pro%' OR `weight` like '%$search_pro%' OR `dimension` like '%$search_pro%' OR `material` like '%$search_pro%') order by `price` asc ";
		}
		if ($_SESSION['short'] == 'low_high') {
			$sql_select = "select * from `product` where `stock`='In Stock' AND (`name` like '%$search_pro%' OR `category` like '%$search_pro%' OR `tag` like '%$search_pro%' OR `one_line_title` like '%$search_pro%' OR `size` like '%$search_pro%' OR `color` like '%$search_pro%' OR `description` like '%$search_pro%' OR `weight` like '%$search_pro%' OR `dimension` like '%$search_pro%' OR `material` like '%$search_pro%') ";
		}
		if ($_SESSION['short'] == 'high_low') {
			$sql_select = "select * from `product` where `stock`='In Stock' AND (`name` like '%$search_pro%' OR `category` like '%$search_pro%' OR `tag` like '%$search_pro%' OR `one_line_title` like '%$search_pro%' OR `size` like '%$search_pro%' OR `color` like '%$search_pro%' OR `description` like '%$search_pro%' OR `weight` like '%$search_pro%' OR `dimension` like '%$search_pro%' OR `material` like '%$search_pro%') order by `price` desc ";
		}
	}
	$data = mysqli_query($conn, $sql_select);
}

?>
<html lang="en">
<head>
	<title>View Products</title>
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
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
					<a href="product.php"
						class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ((strpos($url, 'search_product=necklace') === false) && (strpos($url, 'search_product=bracelet') === false) && (strpos($url, 'search_product=earring') === false)) {
							echo 'how-active1';
						} else
							echo ' '; ?> "
						data-filter="">
						All products
					</a>
	
					<a href="product.php?search_product=necklace"
						class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if (strpos($url, 'search_product=necklace') !== false)
							echo 'how-active1' ?> ">
							Necklaces
						</a>
	
						<a href="product.php?search_product=bracelet"
							class="stext-106 stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if (strpos($url, 'search_product=bracelet') !== false)
							echo 'how-active1' ?> ">
							Bracelets
						</a>
	
						<a href="product.php?search_product=earring"
							class="stext-106 stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if (strpos($url, 'search_product=earring') !== false)
							echo 'how-active1' ?> ">
							Earrings
						</a>
					</div>
	
					<div class="flex-w flex-c-m m-tb-10">
						<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
							<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
							<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
							Search
						</div>
					</div>
	
					<!-- Search product -->
	
					<div class="dis-none panel-search w-full p-t-10 p-b-15">
	
						<div class="bor8 dis-flex p-l-15">
							<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
							<form method="get">
								<input class="mtext-107 cl2 size-114 plh2 p-r-15 search-product" type="text"
									name="search_product" placeholder="Search" id="search_product_text">
							</form>
						</div>
	
					</div>
				</div>
	
				<!-- products -->
	
				<div id="all_product_page_change_data">
					<div class="row isotope-grid">
	
					<?php while ($row = mysqli_fetch_assoc($data_data)) { ?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="./assets/<?php echo $row['image1']; ?>" alt="IMG-PRODUCT">
								</div>
	
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.php?detail_id=<?php echo $row['id']; ?>"
											class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $row['name']; ?>
											<?php if (isset($_GET['search_product'])) { ?>
												<input type="hidden" name="search_txt"
													value="<?php echo $_GET['search_product']; ?>" id="srch_txt">
											<?php } ?>
	
										</a>
	
										<span class="stext-105 cl3">
											Rs.<?php echo $row['price']; ?>
										</span>
									</div>
	
									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
												alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l"
												src="images/icons/icon-heart-02.png" alt="ICON">
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
	
		</div>
	</div>
	
	<?php include_once 'footer.php'; ?>
	
	<?php include_once 'scripts.php'; ?>

</body>
</html>