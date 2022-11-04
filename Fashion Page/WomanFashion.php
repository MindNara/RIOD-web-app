<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/78988707d3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Fashion.css">
    <title>Woman's Fashion</title>
</head>

<body>
    <header>
        <div id="navbar">
            <a class="logo" href="HomePage.html">RIOD</a>
            <nav>
                <ul>
                    <li><a href="MenFashion.php">Men's Fashion</a></li>
                    <li><a href="WomanFashion.php">Woman's Fashion</a></li>
                    <li><a href="Login.php"><img src="https://drive.google.com/uc?id=1X5sxcAb9joKPlVRt2D8SQPZsjw5uUkE_" width="24px"></a>
                    </li>
                    <li><a href="#"><img src="https://drive.google.com/uc?id=1vc_Qugk8SxibamNq_wTBnpRCHRf6Abyp" width="24px"></a></li>
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
                    <li><a href="#">All</a></li>
                    <li><a href="#">Shirts</a></li>
                    <li><a href="#">Shorts</a></li>
                    <li><a href="#">Jeans</a></li>
                    <li><a href="#">Skirt</a></li>
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
                <div class="product">
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
                    <a href="#"><i class="fa-solid fa-plus basket"></i></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <br>

    <footer>
        <div class="footer">
            <p>Test Footer</p>
        </div>
    </footer>

</body>

</html>