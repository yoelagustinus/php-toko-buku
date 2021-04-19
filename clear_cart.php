<?php
	session_start();
	unset($_SESSION['cart']);
	echo "Sukses dihapus";
	header('location: cart.php');
?>