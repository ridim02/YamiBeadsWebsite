<?php include_once 'connection.php'; ?>

<?php include_once 'header.php'; ?>

<?php

    $detail_id = $_GET['detail_id'];

    $sql_select = "select * from `product` where `id`='$detail_id'";
    $data = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($data);

    if (isset($_POST['cart_submit'])) {
        if (isset($_SESSION['login'])) {

            $user_id = $_SESSION['login'];
            $cart_id = $_POST['cart_id'];
            $product = $_POST['num_product'];

            if ($product > 0) {
                $sql_select = "select * from `product` where `id`='$cart_id'";
                $data = mysqli_query($conn, $sql_select);
                $row = mysqli_fetch_assoc($data);

                $sql_select_c = "select * from `cart` where `product_id`='$cart_id' and `user_id`='$user_id'";
                $data_c = mysqli_query($conn, $sql_select_c);
                $row_count = mysqli_num_rows($data_c);
                $row_data = mysqli_fetch_assoc($data_c);

                $product_id = $cart_id;
                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image1'];

                if ($row_count > 0) {
                    $new_price = $price;
                    $new_num_product = $product + $row_data['num_product'];

                    $sql_update = "update `cart` set `price`='$new_price',`num_product`='$new_num_product' where `product_id`='$product_id' and `user_id`='$user_id'";
                    mysqli_query($conn, $sql_update);

                    header('location:cart.php');
                } else {
                    $sql_insert = "insert into `cart`(`product_id`,`user_id`,`name`,`price`,`num_product`,`image`)values('$product_id','$user_id','$name','$price','$product','$image')";
                    mysqli_query($conn, $sql_insert);

                    header('location:cart.php');
                }

            }
        } else {
            $_SESSION['cart_id'] = $_POST['cart_id'];
            $_SESSION['num_product'] = $_POST['num_product'];
            header('location:cart.php');
        }
    }

?>
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="./assets/<?php echo $row['image1']; ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="./assets/<?php echo $row['image1']; ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="./assets/<?php echo $row['image1']; ?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="item-slick3" data-thumb="./assets/<?php echo $row['image2']; ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="./assets/<?php echo $row['image2']; ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="./assets//<?php echo $row['image2']; ?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="item-slick3" data-thumb="./assets/<?php echo $row['image3']; ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="./assets/<?php echo $row['image3']; ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="./assets/<?php echo $row['image3']; ?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?php echo $row['name']; ?>
                    </h4>

                    <span class="mtext-106 cl2">
                        Rs.<?php echo $row['price']; ?>
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        <?php echo $row['one_line_title']; ?>
                    </p>


                    <form method="post" id="add_cart">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num_product" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail cart_submit"
                                        name="cart_submit">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#"
                                class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include_once 'footer.php'; ?>

<?php include_once 'scripts.php'; ?>