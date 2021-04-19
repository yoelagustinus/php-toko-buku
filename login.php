<?php session_start();?>
<?php

 if(isset($_POST['login'])){
	 	$email = $_POST['email'];
		$password = md5($_POST['pass']);
		$serverCek = mysqli_connect('localhost','root', '','db_buku');
		if($serverCek){
			$sql = "SELECT * FROM user";
			$sqlRun = mysqli_query($serverCek,$sql);
			$isfound = false;
			while(!$isfound and $row = mysqli_fetch_assoc($sqlRun)){
				if($row['Email'] == $email && $row['Pass'] == $password){
					$isfound = true;
					$_SESSION['login'] = true;
					$_SESSION['Email'] = $row['Email'];
					$_SESSION['Nama'] = $row['Nama'] ;
          $_SESSION['Pass'] = $row['Pass'] ;
          $_SESSION['Admin'] = $row['Kategori'];
           
          
    		}
				
			}
			if($isfound){
        if($_SESSION['Admin'] = $row['Kategori']){
          header("Location: formAddBuku.php");
        }else{
          header("Location: index.php");
          mysqli_close($serverCek);
          exit();
        }
			}else{
				$message = "Email or Password is incorrect";
			}
     	}else{
			 $message = "Check your connection";
		}
		mysqli_close($serverCek);
	}
?>
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

	<div class="login-wrapper">
	  <div class="container">
		<div class="heading">
		  <h2>Login</h2>
		</div>
		<form action="login.php" method="post">
		  <table>
			<tr>
			  <td>Email : </td>
			  <td><input type="email" name="email" required /></td>
			</tr>
			<tr>
			  <td>Password : </td>
			  <td><input type="password" name="pass" required /></td>
			</tr>
		  </table>
		  <?php 
		  if(isset($message)){
			echo '<br>'. $message;
		  }
		   ?>
		  <br />
		  <input type="submit" class="btn btn-primary" name="login" value="Login" />
		  <a href="register.php">Don't have account? Join now! </a>
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


