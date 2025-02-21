<?php include_once 'connection.php'; ?>
<?php include_once 'header.php'; ?>
<?php

$sql_select = "select * from `about`";
$data = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_assoc($data);

?>
<html lang="en">
<head>
	<title>About Us</title>
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
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('./images/bg.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            About
        </h2>
    </section>
    
    
    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Story
                        </h3>
    
                        <p class="stext-113 cl6 p-b-26">
                            <?php echo $row['story_detail']; ?>
                        </p>
    
                        <p class="stext-113 cl6 p-b-26">
                            Any questions? Visit us at: Labim Mall 4th floor, Pulchowk, Lalitpur, Nepal (This website is not live, its made for learning purpose only, email : 020bscit020@sxc.edu.np | 020bscit029@sxc.edu.np)
                        </p>
                    </div>
                </div>
    
                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                    <div class="how-bor1 ">
                        <div class="hov-img0">
                            <img src="./images/<?php echo $row['story_image']; ?>" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Mission
                        </h3>
    
                        <p class="stext-113 cl6 p-b-26">
                            <?php echo $row['mission_detail']; ?>
                        </p>
    
    
                    </div>
                </div>
    
                <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="how-bor2">
                        <div class="hov-img0">
                            <img src="./images/<?php echo $row['mission_image']; ?>" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
    
            <br>
    
            <div class="bor16 p-l-29 p-b-9 m-t-22">
                <p class="stext-114 cl6 p-r-40 p-b-11">
                    "<?php echo $row['best_thought']; ?>"
                </p>
    
                <span class="stext-111 cl8">
                    - <?php echo $row['thought_by']; ?>
                </span>
            </div>
        </div>
    </section>
    
    <?php include_once 'footer.php'; ?>
    <?php include_once 'scripts.php'; ?>
</body>
</html>