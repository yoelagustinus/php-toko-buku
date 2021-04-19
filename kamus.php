<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Buku Onlen</title>
    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="responsive.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
          <a class="navbar-brand" href="#">Toko Buku Onlen</a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#collapsibleNavbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
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
              <!-- <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Log in</a>
              </li> -->
              <?php
              $con = mysqli_connect("localhost", "root", "", "db_buku");
              if (mysqli_connect_errno()) {
                  echo "Failed to connect to database : " . mysqli_connect_error();
              }
                  session_start();
                  if (isset($_SESSION['login'])) {
                      echo "<li class='nav-item'>";
                      echo "<a class='nav-link' href='profil.php?email=" . $_SESSION['Email'] . "'>Edit Profil</a>";
                      echo "</li>";
                  
                      echo "<li class='nav-item'>";
                      echo "<a class='nav-link' href='cart.php?email=" . $_SESSION['Email'] . "'>Cart</a>";
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

    

      <?php
if (isset($_POST['ID']) && $_POST['ID'] != "") {
    $ID = $_POST['ID'];
    $result = mysqli_query($con, "SELECT * FROM list_buku WHERE `ID`='$ID'");
    $getBuku = mysqli_fetch_assoc($result);
    $Nama_Buku = $getBuku['Nama_Buku'];
    $ID = $getBuku['ID'];
    $Harga = $getBuku['Harga'];
    $Cover = $getBuku['Cover'];

    $cartArray = array(
        $ID => array(
            'Nama_Buku' => $Nama_Buku,
            'ID' => $ID,
            'Harga' => $Harga,
            'quantity' => 1,
            'Cover' => $Cover),
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (!in_array($ID, $array_keys)) {
          $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
        } 
    }
}
?>


<div class="book-wrapper">
      <div class="container">
        <div class="heading">
           <h2>List Category: KAMUS</h2>
        </div>
        <?php
        $result = mysqli_query($con, "SELECT * FROM `list_buku` WHERE Kategori = 'Kamus' ORDER BY Nama_Buku");
        while ($getBuku = mysqli_fetch_assoc($result)) {
            echo "<div class='book'>";
            echo "<div class='book-icon'>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='ID' value=" . $getBuku['ID'] . " />";
            echo "<a href='view_book.php?BookData=$getBuku[ID]&'><div class='Cover'><img src='" . $getBuku['Cover'] . "' /></div></a>";
            echo "<div class='Nama_Buku'>" . $getBuku['Nama_Buku'] . "</div>";
            echo "<div class='Harga'>" . $getBuku['Harga'] . "</div>";

            echo "</div>";
            if (isset($_SESSION['login'])) {
                ?>
                    <button type = 'submit' class="btn btn-primary btn-sm buy">Add to Cart</a>
                    <?php
            }
            if (empty($_SESSION['login'])) {
                echo "<a href='login.php'><input type = 'button' class='btn btn-primary' value='Login to Buy'></a>";
            }
            echo "</form>";
            echo "</div>";
        }
        ?>

    <div class="clear"></div>
    
    <footer>
      <div class="container">
        <h3>Toko Buku Onlen</h3>
      </div>
    </footer>
  </body>
</html>

<?php

?>
