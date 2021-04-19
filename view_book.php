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
    <style>
        #judul_buku{
            color: black;
            font-weight: bold;
            font-size: 160%;
            text-transform: uppercase;
            margin-bottom: 4%;
        }
        .bold{
            text-transform: uppercase;
            font-weight: bold;
            color: black;
            margin-top: 1.5%;
            margin-bottom: 1.5%;
            display: inline-block;
        }
        .biasa{
            font-size: 120%;

        }
        button {
            background-color: #00008b;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        
        </style>
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
              <?php
                  session_start();
                  $con = mysqli_connect("localhost", "root", "", "db_buku");
                  if (mysqli_connect_errno()) {
                      echo "Failed to connect to database : " . mysqli_connect_error();
                  }
                  
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

  
  <body>
    <?php

        $book = $_GET['BookData'];

        $select = "SELECT * FROM list_buku WHERE ID = '$book'";
        $row = mysqli_query($con,$select);
        $getBuku = mysqli_fetch_assoc($row);  
    
    ?>

   
    <div class ="big-container">
        <div class="container">
                <?php
                    echo "<img src = '$getBuku[Cover]' width='200'
                    height='300'><br>";
                    echo "<span id = 'judul_buku'>$getBuku[Nama_Buku]</span><br>";
                    echo "<span class = 'bold'>Harga = " . $getBuku['Harga']. "</span> <br>";
                    echo "<span class = 'bold'>Penulis = " . $getBuku['Penulis'] . "</span> <br>";
                    echo "<span class = 'bold'>Penerbit = " . $getBuku['Penerbit']. "</span> <br>";
                    echo "<span class = 'bold'> Jumlah " . $getBuku['Jumlah_Halaman']. "</span> <br>";
                    echo "<span class = 'bold'>Kategori = " . $getBuku['Kategori']. "</span> <br>";
                    echo "<span class='biasa'>Rating = " . $getBuku['Rating']. "</span> <br>";
                    echo "<span class='biasa'>Sinopsis = " . $getBuku['Sinopsis']. "</span> <br><br>";
                   
                ?>
            

        </div>
    </div>

    <footer>
      <div class="container">
        <h3>Toko Buku Onlen</h3>
      </div>
    </footer>
  </body>
  <?php
    mysqli_close($con);
  ?>
</html>

