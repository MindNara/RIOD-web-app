<?php
// session_start();
// include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>RIOD</title>
</head>

<body>
    <header>
        <div id="navbar">
            <a class="logo">RIOD</a>
            <nav>
                <ul>
                    <li><a href="#">Men's Fashion</a></li>
                    <li><a href="#">Woman's Fashion</a></li>
                    <li><img href="#" src="https://drive.google.com/uc?id=1X5sxcAb9joKPlVRt2D8SQPZsjw5uUkE_" width="24px"></li>
                    <li><img href="#" src="https://drive.google.com/uc?id=1vc_Qugk8SxibamNq_wTBnpRCHRf6Abyp" width="24px" padding-left="20px"></li>
                </ul>
            </nav>
            <hr>
        </div>
    </header>

    <div class="header">
        <a>REGISTER</a>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <!-- <div class="error">
                <h3>
                    <?php
                    // echo $_SESSION['error'];
                    // unset($_SESSION['error']);
                    ?>
                </h3> -->
            </div>
        <?php endif ?>

        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username">
        </div>
        <br>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" placeholder="Password">
        </div>
        <br>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">SIGN UP</button>
        </div>
        <br>
        <div class="Sign-Up">
            <p>Already a user? <a href="login.php">LOGIN</a></p>
        </div>
    </form>

</body>

</html>