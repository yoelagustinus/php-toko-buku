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
            
        </style>
    </head>
    <body>
            <?php
                $con = mysqli_connect("localhost", "root", "", "db_buku");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to database : " . mysqli_connect_error();
                }

                $book = $_GET['BookData'];

                $select = "SELECT * FROM list_buku WHERE ID = '$book'";
                $row = mysqli_query($con,$select);
                $getBuku = mysqli_fetch_array($row);
            
            
            ?>
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

    <div class ="big-container">
        <div class="container">

            <?php
                 
                echo "<img src = '$getBuku[8]' width='200'
                height='300'><br>";
                echo "<h2>$getBuku[1]</h2>";
                echo "<span class = 'bold'>Harga = " . $getBuku[6]. "</span> <br>";
                echo "<span class = 'bold'>Penulis = " . $getBuku[2] . "</span> <br>";
                echo "<span class = 'bold'>Penerbit = " . $getBuku[3]. "</span> <br>";
                echo "<span class = 'bold'> Jumlah " . $getBuku[5]. "</span> <br>";
                echo "<span class = 'bold'>Kategori = " . $getBuku[9]. "</span> <br>";
                echo "<span class='biasa'>Rating = " . $getBuku[4]. "</span> <br>";
                echo "<span class='biasa'>Sinopsis = " . $getBuku[7]. "</span> <br><br>";
                
            ?>

            <h3>Form For Edit Price Book</h3>
        <?php
            echo "<form action='' method='POST'>
                Nama Buku:<input type='text' name='Nama_Buku' id='Nama_Buku' value = '$getBuku[1]' required>  <br>      
                Harga:<input type='text' name='Harga' id='Harga'  value = '$getBuku[6]' required><br>
                Rating: <input type='text' name='rating' id='rating' value='$getBuku[4]' required> <br>
                <input type='submit' name='submit' id='submit' value='UPDATE'>
                
            </form>";
        ?>
            <?php
                if(isset($_POST["submit"])){

                    $title = $_POST['Nama_Buku'];
                    $price = $_POST['Harga'];
                    $rating = $_POST['rating'];
            
                    $sql = "UPDATE list_buku SET Nama_Buku='$title', Harga = '$price', Rating='$rating' WHERE ID = '$getBuku[0]'";
            
                    if (mysqli_query($con, $sql)){
                        echo "Book '$title' successfully updated. <br>";
                    } else {
                        echo "Failed." . mysqli_error($con);
                    }
                } 
                
            ?>
            
        </div>
    </div>
</body>
</html>