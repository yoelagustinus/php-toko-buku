<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Onlen</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand">Toko Buku Onlen</a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                  <div class="dropdown">
                      <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          List Buku
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a href="list.php"><button class="dropdown-item" type="button">All</button></a>
                        <a href = "novel.php"><button class="dropdown-item" type="button">Novel</button></a>
                        <a href="comic.php"><button class="dropdown-item" type="button">Comic</button></a>
                        <a href = "majalah.php"><button class="dropdown-item" type="button">Majalah</button></a>
                        <a href = "edukasi.php"><button class="dropdown-item" type="button">Edukasi</button></a>
                        <a href = "kamus.php"><button class="dropdown-item" type="button">Kamus</button></a>
                      </div>
                    </div>
              </li>
              <?php
                  $con = mysqli_connect("localhost", "root", "", "db_buku");
                  if (mysqli_connect_errno()) {
                      echo "Failed to connect to database : " . mysqli_connect_error();
                  }
                  session_start();
                  if (isset($_SESSION['login'] )) {
					echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='userprofile.php?email=" . $_SESSION['Email'] . "'>Edit Profil</a>";
                    echo "</li>";

                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='cart.php?email=" . $_SESSION['Email'] . "'>Cart<span></a>";
                    echo "</li>";
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='logout.php'>Log out</a>";
                    echo "</li>";  

                   
                  } else {
					echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='register.php'>Register</a>";
                    echo "</li>";
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='login.php'>Log in</a>";
                    echo "</li>";
                  
                  }
              ?>
          </ul>
          </div>
      </nav>
    </header>
<br><br><br>
<?php
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["ID"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Produk Dihapus!!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['ID'] === $_POST["ID"]){
        $value['quantity'] = $_POST["quantity"];
        break;
    }
}
  	
}
?>


<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table table-striped">
<tbody>
<tr>
<td scope="col"></td>
<th scope="col">Nama</th>
<th scope="col">Jumlah</th>
<th scope="col">Harga per Buku</th>
<th scope="col"> Subtotal</th>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td scope="row"><img src='<?php echo $product["Cover"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["Nama_Buku"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='ID' value="<?php echo $product["ID"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='btn btn-danger btn-sm remove'>Hapus Buku</button>
</form>
</td>
<td scope="row">
<form method='post' action=''>
<input type='hidden' name='ID' value="<?php echo $product["ID"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td scope="row"><?php echo "Rp".$product["Harga"]; ?></td>
<td><?php echo "Rp".$product["Harga"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["Harga"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right" scope="row">
<strong>TOTAL: <?php echo "Rp".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "Keranjang masih kosong!";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


</div>
</body>
</html>