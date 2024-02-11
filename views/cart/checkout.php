<?php
	session_start();
	// User ต้อง login เพื่อ checkout
	$_SESSION['message-checkout'] = 'Checkout Complete :D';
	header('location: cart.php');
?>