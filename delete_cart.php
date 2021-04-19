<?php
	session_start();
	$key = array_search($_GET['ID'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['quality_array'][$_GET['counter']]);
	$_SESSION['quality_array'] = array_values($_SESSION['quality_array']);

	$_SESSION['message'] = "Sukses dihapus";
	header('location: cart.php');
?>