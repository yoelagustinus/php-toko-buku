<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Buku</title>
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
    #Sinopsis{
        height : 200px;
        width : 200px;    
    }
    </style>
  </head>
  <body>
<?php
$con = mysqli_connect("localhost", "root", "", "db_buku");
if (mysqli_connect_errno()) {
    echo "Failed to connect to database : " . mysqli_connect_error();
}

?>
    <header>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
          <a class="navbar-brand" href="#">Add Buku: Admin</a>
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
                    <a class="nav-link" href="formAddBuku.php">AddBuku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="editBuku.php">Edit Buku</a>
                </li>
                <?php
                  session_start();
                  if (isset($_SESSION['login'])) {
                    if($_SESSION['Admin'] == true){
                      echo "<li class='nav-item'>";
                      echo "<a class='nav-link' href='logout.php'>Log out</a>";
                      echo "</li>";
                    }
                  }

                  if (empty($_SESSION['login'])) {
                    header("location: index.php");
                  }
                ?>
            </ul>
          </div>
        </nav>
      </header>

    <div class="login-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Add New Book</h2>
        </div>
            <form action = "prosesAddBook.php" method="POST" enctype="multipart/form-data">
                <table>
                
                <tr>
                    <td>Nama_Buku</td>
                    <td><input type="text" name="Nama_Buku" id="Nama_Buku" required></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td><input type="text" name="Penulis" id="Penulis" required></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="Penerbit" id="Penerbit" required></td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td><input type="text" name="Rating" id="Rating" required></td>
                </tr>
                <tr>
                    <td>Jumlah Halaman</td>
                    <td><input type="text" name="Jumlah_Halaman" id="Jumlah_Halaman" required></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="Harga" id="Harga" required></td>
                </tr>
                <tr>
                    <td>Sinopsis</td>
                    <td><textarea name="Sinopsis" id="Sinopsis" required></textarea></td>
                </tr>

                <tr>
                    <td>Cover</td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload" value="" required></td>
                </tr>
                
                <tr>
                    <td>Kategori</td>
                    <td>
                        <input type="radio" name="Kategori" value="Edukasi" required>Edukasi
                        <input type="radio" name="Kategori" value="Kamus" required>Kamus
                        <input type="radio" name="Kategori" value="Komik" required>Komik
                        <input type="radio" name="Kategori" value="Majalah" required>Majalah
                        <input type="radio" name="Kategori" value="Novel" required>Novel
                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <td><a href="Data_of_Book.xml">Lihat Data</a></td>
                    <td>    
                    <input type="submit" name="submit" id="submit" value="INSERT">
                    </td>
                </tr>

                </table>
            </form>
            

      </div>
    </div>

    <div class ="big-container">
        <div class="container">
            <div class="heading">
                <h2></h2>
            </div>
        </div>
    </div>

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
