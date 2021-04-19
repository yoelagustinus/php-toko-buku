<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Buku</title>
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
          <a class="navbar-brand" href="#">Edit Buku: Admin</a>
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
          <h2>Edit Buku</h2>
        </div>
            
          <?php
            $con = mysqli_connect("localhost", "root", "", "db_buku");
            if (mysqli_connect_errno()) {
              echo "Failed to connect to database : " . mysqli_connect_error();
            }
            $select = "SELECT * FROM list_buku ORDER BY ID";
            $row = mysqli_query($con, $select);
            $counterBuku = 0;
            echo "<table border='1px'>
                <tr>
                    <th>id Buku</th>
                    <th>Judul Buku</th>
                    <th>Delete Buku</th>
                    <th>Edit Buku</th>
                </tr>
            ";
            while($getBuku = mysqli_fetch_array($row)){
                $counterBuku +=1;
                echo "<tr>";
                echo "<td>$getBuku[0]</td>
                <td>$getBuku[1]</td>
                <td><a href='prosesDeleteBook.php?BookData=$getBuku[0]&'>Delete</a></td>
                <td><a href='view_for_editBook.php?BookData=$getBuku[0]&'>Edit</a></td>";
                echo "</tr>";
                        
            }
            echo "</table>";
            //jika id lompat, karena id AUTO INCREMENTS, jadi kalau ada yang di DELETE buku di tengah ID automatis INSERT data baru tsb, IDnya yang
            mysqli_close($con);
            
          ?>

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
