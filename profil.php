<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="responsive.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <title>Profile Page</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Toko Buku Onlen</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
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
                                <button class="dropdown-item" type="button"><a href="list.php">All</a></button>
                                <button class="dropdown-item" type="button">Novel</button>
                                <button class="dropdown-item" type="button">Comic</button>
                                <button class="dropdown-item" type="button">Majalah</button>
                                <button class="dropdown-item" type="button">Edukasi</button>
                                <button class="dropdown-item" type="button">Kamus</button>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="profil-wrapper">
        <div class="container">
            <div class="heading">
                <?php
                $con = mysqli_connect("localhost", "root", "", "db_buku");

                // Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " .
                        mysqli_connect_error();
                }

                //ambil data ke database
                $result = mysqli_query($con, "SELECT Nama,Email FROM user");
                echo "<h3>My Profile</h3>";

                //print data dari database 
                echo "<Table>";
                while ($row = mysqli_fetch_row($result)) {
                    echo "<tr><th> Nama  : <td>$row[0]</td></th></tr>";
                    echo "<tr><th> Email : <td>$row[1]</td></th></tr>";
                }
                echo "</Table>";

                mysqli_close($con);
                ?>

                <div class="clear"></div>

                <footer>
                    <div class="container">
                        <h3>Toko Buku Onlen</h3>
                    </div>
                </footer>
</body>


</body>

</html>