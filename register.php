<?php

include_once 'connection.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 == $password2) {
        $sql_select_email = "select * from `user_register` where `email`='$email'";
        $data_email = mysqli_query($conn, $sql_select_email);
        $email_count = mysqli_num_rows($data_email);

        $sql_select_mobile = "select * from `user_register` where `mobile_number`='$mobile'";
        $data_mobile = mysqli_query($conn, $sql_select_mobile);
        $mobile_count = mysqli_num_rows($data_mobile);

        if ($email_count == 0) {
            if ($mobile_count == 0) {
                $sql_insert = "insert into `user_register`(`name`,`email`,`mobile_number`,`password`)values('$name','$email','$mobile','$password1')";
                mysqli_query($conn, $sql_insert);

                header('location:login.php');
            } else { ?>
                <div style="text-align: center; color: red; padding-top:10px;">"Entered Mobile Number is already exist.... Please enter correct Mobile number or user Forgot Password option...."</div>
            <?php }
        } else { ?>
            <div style="text-align: center; color: red; padding-top:10px;">"Entered Email ID is already exist.... Please enter correct email or user Forgot Password option...."</div>
        <?php }
    } else { ?>
        <div style="text-align: center; color: red; padding-top:10px;">"Re-entered password is not match.. Kindly enter same password in both tab...."</div>
<?php }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Here!</title>
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
    <style>
        #container {
            display: flex;

            height: 100%;
            width: 100%;
        }

        #logo-text-container {
            display: flex;
            background-color: #cdc1ff;
            background-image: linear-gradient(316deg, #cdc1ff 0%, #e5d9f2 74%);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40%;
        }

        #form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60%;
        }

        #all {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="logo-text-container">
            <div class="container">
                <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                    <a href="dashboard.php" class="logo_login">
                        <img src="images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>
                </div>
            </div>


        </div>
        <div id="form-container text-left" class="" style='padding-left: 30px; padding-top: 15px; padding-bottom: 15px;'>
            <form method="post">
                <div class="login_text">
                    <h4 class="p-b-15 ltext-108 cl2 trans-04">
                        REGISTER NOW
                    </h4>

                    <p class="stext-117 cl6">
                        Enjoy a personalised shopping experience
                    </p>
                </div>
                <div class="p-t-25">

                    <div class="p-b-5">
                        <label class="stext-102 cl3" for="name">Name</label>
                        <input type="text" name="name" class="size-111 bor8 stext-102 cl2 p-lr-20" required>
                    </div>

                    <div class="p-b-5">
                        <label class="stext-102 cl3" for="email">Email</label>
                        <input type="email" name="email" class="size-111 bor8 stext-102 cl2 p-lr-20" required>
                    </div>

                    <div class="p-b-5">
                        <label class="stext-102 cl3" for="mobile">Mobile Number</label>
                        <input type="text" name="mobile" class="size-111 bor8 stext-102 cl2 p-lr-20" required>
                    </div>

                    <div class="p-b-5">
                        <label class="stext-102 cl3" for="password1">Password</label>
                        <input type="password" name="password1" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="6" maxlength="10" required>
                    </div>

                    <div class="p-b-5">
                        <label class="stext-102 cl3" for="password2">Re-Enter Password</label>
                        <input type="password" name="password2" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="6" maxlength="10" required>
                    </div>

                    <br>

                    <div class="p-b-5 button_login_flex">
                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="register">
                            Submit
                        </button>
                    </div>
                    <!-- <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="register">
                                        Submit
                                    </button> -->

                    <label class="stext-102 cl3 text-center">--- OR ----</label>

                    <div class="login_flex">
                        <small style="font-size: 13px">Go back to login? </small>&nbsp;&nbsp;
                        <a href="login.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register" name="review_submit" id="review_count">Back to Login</a>
                    </div>
            </form>
        </div>
    </div>

    <!-- Shoping Cart -->
    <?php include_once 'scripts.php'; ?>
</body>