<!DOCTYPE html>
<?php
	if(isset($_POST['register'])){
    $email = $_POST['email'];
    $name = $_POST['nama'];
    $pwd = md5($_POST['pass']);
    $pwdC = md5($_POST['passcek']);
    $con = mysqli_connect('localhost','root', '','db_buku');
		if($con){
			$sql = "SELECT Nama,Email,Pass FROM user";
			$sqlRun = mysqli_query($con,$sql);
			$emailConflict = false;
			while($row = mysqli_fetch_assoc($sqlRun) and (!$emailConflict)){
				if($row['Email'] == $email){
					$emailConflict = true;
				}
			}
			if($pwd != $pwdC){
				$msg ="Password Not Match, try again!";
			}else if($emailConflict){
				$msg = "Email has already taken, try again!";
			}else{
				$sql = "INSERT INTO user (Nama,Email,Pass) VALUES ('$name','$email','$pwd')";
        $sqlRun = mysqli_query($con,$sql);
        mysqli_close($con);
				if($sqlRun){
					header("Location: login.php");
				}else{
					$msg = "Registation Failed!";
				}
			}
			mysqli_close($con);
		}else{
			$msg = "Check your connection!";
		}
	}

?>
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
    <div class="login-wrapper">
        <div class="container">
          <div class="heading">
             <h2>Register</h2>
          </div>
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td>Nama: </td>
                        <td><input type="text" name="nama" required /></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="email" name="email" required /> </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="pass" required /></td>
                    </tr>
                    <tr>
                        <td>Confirm Password: </td>
                        <td><input type="password" name="passcek" required /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" class="btn btn-primary" name = "register" value="Register">
                <?php
                  if(isset($msg)){
                    echo $msg;
                  }
                ?>
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


