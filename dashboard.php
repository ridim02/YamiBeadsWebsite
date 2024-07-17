<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div id="dashboard-container" data-aos="fade-up">
        <?php include_once("./header.php"); ?>
        <div class="flex-container" style="margin-top:0px;">
            <div id="left-content" class="text-left">
                <img src="./images/dashboard-earring.png" alt="dashboard-earring">
            </div>
            <div id="right-content" class="text-left" data-aos="fade-left">
                <h1>Earrings</h1>
                <b><i>"Every pair, a promise of grace."</i></b>
                <br>
                <br>
                <p>Add a touch of elegance to your look with our handcrafted earrings. Each pair is designed to frame your face with delicate beauty, enhancing your natural features with a subtle sparkle.</p>
                <br>
                <p>Let your ears dance with delight and express your individuality through the timeless allure of our handmade earrings.</p>
                <br>
                <a href="product.php?search_product=earring" class="btnBuyHere trans-04 register" name="buylink" id="buylink">Buy here!</a>
            </div>
        </div>
        <div class="flex-container">
            <div id="left-content" class="text-left" data-aos="fade-right">
                <h1>Bracelets</h1>
                <b><i>"Adorn your wrist, adorn your soul."</i></b>
                <br>
                <br>
                <p>Discover the elegance and charm that each bracelet brings to your collection. Handcrafted with love and attention to detail, our bracelets are more than just accessories—they're a reflection of your unique style and personality. </p>
                <br>
                <p>Whether you’re dressing up for a special occasion or adding a touch of sophistication to your everyday look, our bracelets are the perfect companion.</p>
                <br>
                <a href="product.php?search_product=bracelet" class="btnBuyHere trans-04 register" name="buylink" id="buylink">Buy here!</a>
            </div>
            <div id="right-content" class="text-right" data-aos="fade-left">
                <img src="./images/dashboard-bracelet.png" alt="dashboard-ring">
            </div>
        </div>
        <div class="flex-container">
            <div id="left-content" class="text-left" data-aos="fade-right">
                <img src="./images/dashboard-necklace.png" alt="dashboard-necklace">
            </div>
            <div id="right-content" class="text-left" data-aos="fade-left">
                <h1>Necklace</h1>
                <b><i>"Let your neckline sparkle with uniqueness."</i></b>
                <br>
                <br>
                <p>Elevate your style with our exquisite handmade necklaces. Each necklace is a masterpiece, carefully crafted to enhance your natural beauty and add a touch of sophistication to any outfit. </p>
                <br>
                <p>Wear a story around your neck and let the world see the beauty and uniqueness that defines you.</p>
                <br>
                <a href="product.php?search_product=necklace" class="btnBuyHere trans-04 register" name="buylink" id="buylink">Buy here!</a>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <?php include_once './scripts.php'; ?>
</body>

</html>