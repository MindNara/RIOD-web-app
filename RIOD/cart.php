<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Fashion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title>RIOD</title>
</head>

<body>
    <header>
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
                                            <!-- ข้อมูลบุคคล -->
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


                    <!-- ชื่อ user -->
                    <?php if (isset($_SESSION['username'])) : ?>

                        <?php echo  $_SESSION['username']; ?>

                    <?php endif ?>
                </div>
            </li>

            </ul>
        </nav>
        </div>
    </header>

    <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </form>
    <div class="container">
        <h1 class="page-header text-center">Cart Details</h1>
        <div class="row">
            <div class="col-sm-12">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }

                ?>
                <?php
                if (isset($_SESSION['message-checkout'])) {
                ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['message-checkout']; ?>
                    </div>
                <?php
                    unset($_SESSION['message-checkout']);
                }

                ?>
                <form method="POST" action="save_cart.php">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                            // เช็คจำนวน + ราคา
                            $total = 0;
                            if (!empty($_SESSION['cart'])) {
                                //connection
                                $conn = new mysqli('localhost', 'root', '', 'tbwm');
                                // สร้างอาร์เรย์ของจำนวนเริ่มต้นซึ่งก็คือ 1
                                $index = 0;
                                if (!isset($_SESSION['qty_array'])) {
                                    $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                }

                                $sql = "SELECT * FROM tbwm.all WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";

                                $query = $conn->query($sql);
                                while ($product = $query->fetch_assoc()) {

                            ?>
                                    <tr>
                                        <td>
                                            <a href="delete_item.php?id=<?php echo $product['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger" style="width:100%"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><?php echo number_format($product['price'], 2); ?></td>
                                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                        <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                                        <td><?php echo number_format($_SESSION['qty_array'][$index] * $product['price'], 2); ?></td>
                                        <?php $total += $_SESSION['qty_array'][$index] * $product['price']; ?>
                                    </tr>
                                <?php
                                    $index++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Item in Cart</td>
                                </tr>
                            <?php
                            }

                            ?>

                            <tr>
                                <td colspan="4" align="right"><b>Total</b></td>
                                <td><b><?php echo number_format($total, 2); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-dark"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                    <button type="submit" class="btn btn-secondary" name="save">Save Changes</button>
                    <a href="clear_cart.php" class="btn btn-dark"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
                    <a href="checkout.php" class="btn btn-secondary"><span class="glyphicon glyphicon-check"></span> Checkout</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>