<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: HomePage.php');
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HomePage.css">
    <title>RIOD</title>
</head>

<body>
    <header>
        <div id="navbar">
            <a class="logo" href="HomePage.php">RIOD</a>
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
                                                    <p><a href="HomePage.php?logout='1'" style="color: black;">Logout</a></p>
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

    <div class="banner">
        <div class="menProd">
            <h1>MEN'S</h1>
            <p>FASHION</p>
            <a class="seeMore" href="MenFashion.php">See More</a>
        </div>
        <div class="womanProd">
            <h1>WOMAN'S</h1>
            <p>FASHION</p>
            <a class="seeMore" href="WomanFashion.php">See More</a>
        </div>
    </div>

    </div>

</body>

</html>