<?php
include_once 'connection.php';

if (!isset($_SESSION['login'])) header('location:login.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $new_num_product = $_GET['add_pro'];
    $login_id = $_SESSION['login'];
    if ($new_num_product > 0) {
        $sql_update = "update `cart` set `num_product`='$new_num_product' where `product_id`='$id' AND `user_id`='$login_id'";
        mysqli_query($conn, $sql_update);
    }
}

if (isset($_SESSION['login'])) {
    $login_id = $_SESSION['login'];

    $sql_select = "select * from `cart` c left join `product` p on c.product_id = p.id where `user_id`='$login_id'";
    $data = mysqli_query($conn, $sql_select);
    $total_price = 0;
    $cart_items = [];
    while ($row_total = mysqli_fetch_assoc($data)) {
        $total_price += $row_total['price'] * $row_total['num_product'];
        $cart_items[] = $row_total;
    }

} else {
    header('location:login.php');
}

if (isset($_POST['buy'])) {
    if (isset($_SESSION['login'])) {
        header('location:order-now.php');
    } else {
        header('location:login.php');
    }
}

if (isset($_GET['d_id'])) {
    $id_d = $_GET['d_id'];

    $sql_delete = "delete from `cart` where `product_id`='$id_d' and `user_id`='$login_id'";
    mysqli_query($conn, $sql_delete);
}


?>

<html lang="en">

<head>
    <title>My Cart</title>
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
<?php include_once("./header.php"); ?>
    <div id="new_number_of_product">
        <form class="bg0 p-t-45 p-b-85" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                    </tr>

                                    <?php if (isset($_SESSION['login'])) {
                                        foreach ($cart_items as $row) { ?>
                                            <tr class="table_row">
                                                <td class="column-1" align="center">

                                                    <a href="javascript:void(0)" class="delete_from_cart" attr_id=<?php echo $row['id']; ?>>
                                                        <div class="how-itemcart1">
                                                            <img src="./assets/<?php echo $row['image']; ?>" alt="IMG">
                                                        </div>
                                                    </a>

                                                </td>
                                                <td class="column-2">
                                                    <div class="p-b-10">
                                                        <a href="product-detail.php?detail_id=<?php echo $row['product_id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                            <?php echo $row['name']; ?>
                                                    </div>
                                                    </a>
                                                </td>
                                                <td class="column-3">Rs.<?php echo $row['price']; ?></td>
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <a href="javascript:void(0)" attr_id=<?php echo $row['id']; ?> attr_pro=<?php echo $row['num_product'] - 1; ?> class="dec_number">
                                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                                            </div>
                                                        </a>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?php echo $row['num_product']; ?>">

                                                        <?php
                                                        $num_product = $row['num_product'];
                                                        $quantity = $row['quantity'];
                                                        if ($num_product < $quantity) {
                                                            echo "<a href='javascript:void(0)' attr_id=" . $row['id'] . " attr_pro=" . ($row['num_product'] + 1) . " class='add_number'>
                                                            <div class='btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m'>
                                                                <i class='fs-16 zmdi zmdi-plus'></i>
                                                            </div>
                                                        </a>";
                                                        } else {
                                                            echo '';
                                                        } ?>
                                                    </div>
                                                </td>
                                                <td class="column-5">
                                                    <?php

                                                    $total_pro = $row['num_product'];
                                                    $price = $row['price'];

                                                    echo 'Rs.' . $total_pro * $price;
                                                    ?>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">

                                <a href="product.php">
                                    <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                        Add More Product
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Subtotal:
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2">
                                        <?php if (isset($_SESSION['login'])) { ?>
                                            Rs.<?php echo $total_price; ?>
                                        <?php } else {
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
                                        <?php if (isset($_SESSION['login'])) { ?>
                                            Rs.<?php echo $total_price; ?>
                                        <?php } else {
                                            echo "Rs.0";
                                        } ?>
                                    </span>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="buy">
                                Proceed to Buy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <?php include_once 'footer.php'; ?>

    <?php include_once 'scripts.php'; ?>
</body>