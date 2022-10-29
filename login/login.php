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
        <h2>LOGIN</h2>
    </div>

    <form action="login_db.php" method="post">
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
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <br>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">LOGIN</button>
        </div>
        <div class="Sign-Up">
            <br>
            <p>Need an account? <a href="register.php">SIGN UP</a></p>
        </div>
    </form>
</body>

</html>