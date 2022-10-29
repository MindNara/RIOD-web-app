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
    <nav>
        <div class="nav-items-1">
            <a href="#">Men's Fashion</a>
            <a href="#">Women's Fashion</a>
        </div>
        <div class="logo">
            <h1>RIOD</h1>
        </div>
        </div>
        <div class="nav-items-2">
            <a href="#cart"><img class="cart" src="https://bit.ly/3DrG4A2"></a>
            <a href="#cart"><i class="fa fa-shopping-cart" style="font-size:32px"></i></a>
        </div> 
    </nav>

    <div class="header">
        <h2>REGISTER</h2>
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