<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
}

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/78988707d3.js" crossorigin="anonymous"></script>
    <script src="Scroll.js"></script>
    <link rel="stylesheet" href="Fashion.css">
    <title>Woman's Fashion</title>
</head>

<body>
    <header>
        <div class="progressBar"></div>
        <div id="navbar">
            <a class="logo" href="index.php">RIOD</a>
            <nav>
                <ul>
                    <li><a href="MenFashion.php">Men's Fashion</a></li>
                    <li><a href="WomanFashion.php">Woman's Fashion</a></li>
                    <li><a href="cart.php"><img src="https://drive.google.com/uc?id=1vc_Qugk8SxibamNq_wTBnpRCHRf6Abyp" width="24px"></a></li>
                    <li>
                        <div class="LogOutBar">
                            <ul class="LogOutTab">
                                <li><a href="Login.php"><img src="https://drive.google.com/uc?id=1X5sxcAb9joKPlVRt2D8SQPZsjw5uUkE_" width="24px"></a>
                                    <?php if (isset($_SESSION['username'])) : ?>
                                        <ul class="dropdown2">
                                            <div class="logout">
                                                <!-- logged in user information -->
                                                <?php if (isset($_SESSION['username'])) : ?>
                                                    <p><a href="index.php?logout='1'" style="color: black;">Logout</a></p>
                                                <?php endif ?>

                                        </ul>
                                </li>
                        </div>
                    </li>
                <?php endif ?>

                <li>
                    <div class="homecontent">


                        <!-- logged in user information -->
                        <?php if (isset($_SESSION['username'])) : ?>

                            <?php echo  $_SESSION['username']; ?>

                        <?php endif ?>
                    </div>
                </li>

                </ul>
            </nav>
        </div>
    </header>

    <div class="title">
        <h1>Woman's Fashion</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quis eligendi excepturi<br>
            nihil sed commodi inventore, minus doloremque quo maxime ipsam<br>
            eveniet explicabo totam. Explicabo, remat?
        </p>
    </div>

    <div class="productBox">
        <ul class="category">
            <li><a href="#" class="dropbtn">Category
                    <img src="https://media.discordapp.net/attachments/1032627025489432626/1037361821948059689/icons8-expand-arrow-50.png" height="16px" width="16px">
                </a>
                <ul class="dropdown">
                    <li class="list active" data-filter="all">All</li>
                    <li class="list" data-filter="Shirt">Shirts</li>
                    <li class="list" data-filter="Short">Shorts</li>
                    <li class="list" data-filter="jean">Jeans</li>
                    <li class="list" data-filter="Coat">Coat</li>
                </ul>
            </li>
        </ul>

        <?php

        include 'condb.php';
        $query = "SELECT * FROM woman";
        $result = mysqli_query($condb, $query) or die("Error in sql : $query" . mysqli_error($$query));

        ?>

        <div class="containerProduct">
            <?php foreach ($result as $product) { ?>
            <div class="product" data-item="<?php echo $product['type']; ?>">
                <div class="card">
                    <div class="content">
                        <div class="front">
                            <img class="imgProd" src="<?php echo $product['image1']; ?>">
                        </div>
                        <div class="back">
                            <img class="imgProd" src="<?php echo $product['image2']; ?>">
                        </div>
                    </div>
                </div>
                <div class="textProd">
                    <h3><?php echo $product['name']; ?></h3>
                    <p class="detail"><?php echo $product['detail']; ?></p>
                    <h3 class="price"><?php echo "฿ " . $product['price']; ?></h3>
                </div>
                <a href="add_cart.php?id=<?php echo $product['id']; ?>"class="fa-solid fa-plus basket"></i></a>
            </div>
            <?php } ?>
        </div>
    </div>
    <br>

    <footer>
        <div class="footer">
            <p>JOIN OUR NEWSLETTER</p>
            <div class="contact">
                <ul>
                    <li><a href="#">TIKTOK</a></li>
                    <li><a href="#">INSTAGRAM</a></li>
                    <li><a href="#">FACEBOOK</a></li>
                    <li><a href="#">TWITTER</a></li>
                    <li><a href="#">PINTEREST</a></li>
                    <li><a href="#">YOUTUBE</a></li>
                    <li><a href="#">SPOTIFY</a></li>
                </ul>
            </div>
            <div class="setting">
                <ul>
                    <li><a href="#">COOKIES SETTINGS</a></li>
                    <p>|</p>
                    <li><a href="#">PRIVACY AND COOKIES POLICY</a></li>
                    <p>|</p>
                    <li><a href="#">TERMS OF USE</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
    
<script>
let list = document.querySelectorAll('.list');
let product = document.querySelectorAll('.product');

for (let i = 0; i < list.length; i++) {
    list[i].addEventListener('click', function() {
        for (let j = 0; j < list.length; j++) {
            list[j].classList.remove('active');
        }
        this.classList.add('active');

        let dataFilter = this.getAttribute('data-filter');

        for (let k = 0; k < product.length; k++) {
            product[k].classList.remove('active');
            product[k].classList.add('hide');

            if (product[k].getAttribute('data-item') == dataFilter || dataFilter == "all") {
                product[k].classList.remove('hide');
                product[k].classList.add('active');
            }
        }
    })
}
</script>

</html>
