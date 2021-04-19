<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "db_buku");

$username = $_SESSION['Email'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE Email='$username'");

// query memilih entri username pada database
if (mysqli_num_rows($sql) == 0) {
} else {
    $row = mysqli_fetch_assoc($sql);
}

?>



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
                                <a href="list.php"><button class="dropdown-item" type="button">All</button></a>
                                <a href="novel.php"><button class="dropdown-item" type="button">Novel</button></a>
                                <a href="comic.php"><button class="dropdown-item" type="button">Comic</button></a>
                                <a href="majalah.php"><button class="dropdown-item" type="button">Majalah</button></a>
                                <a href="edukasi.php"><button class="dropdown-item" type="button">Edukasi</button></a>
                                <a href="kamus.php"><button class="dropdown-item" type="button">Kamus</button></a>
                            </div>
                        </div>
                    </li>

                    <!---drop down -->


                    <li class='nav-item'>
                        <a class='nav-link' href='userprofile.php'>Profil</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link' href='cart.php'>Cart</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='logout.php'>Log out</a>
                    </li>


                    <li class='nav-item'>
                        <a class='nav-link' href='login.php'>Log in</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>




    <div class="login-wrapper">
        <div class="container">
            <div class="heading">
                <h2></h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Nama: </td>

                        <td>
                            <input type="hidden" name="id" value=<?php echo $row['ID']; ?> />
                            <input type="text" name="nama" value=<?php echo $row['Nama']; ?> />
                        </td>

                    </tr>
                    <tr>

                        <td>Email: </td>
                        <td>
                            <input type="email" name="email" value=<?php echo $row['Email']; ?> /> </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="pass" value=<?php echo $row['Pass']; ?> /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" class="btn btn-primary" name="update" value="update">

                <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
            </form>
        </div>
    </div>
    <footer>
        <div class="container">
            <h3>Toko Buku Onlen</h3>
        </div>
    </footer>
</body>

</html>


<?php



if (isset($_POST['update'])) {

    $id = $_POST['ID'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $sql = mysqli_query($con, "UPDATE user set
                                            ID='$id',
											Nama		= '$nama',
											Pass		= '$pass' 
											where  Email= '$email' and Nama='$nama'") or die(mysqli_error($con));

    echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='userprofile.php?hal=1';
								</script>";
    exit;
}

if (isset($_POST['batal'])) {
    echo "<script language=javascript>
								window.location='userprofile.php?hal=1';
								</script>";
    exit;
}
?>