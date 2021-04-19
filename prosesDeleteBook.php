<?php
$dbname = "db_buku";

$con = mysqli_connect("localhost", "root", "", "db_buku");
if (mysqli_connect_errno()) {
    echo "Failed to connect to database : " . mysqli_connect_error();
}

$book = $_GET['BookData'];
$select = "DELETE FROM list_buku WHERE ID = '$book'";

if (mysqli_query($con,$select)){
    echo "Book Successfully DELETE from $dbname";
    
} else {
    echo "Failed." . mysqli_error($con);
}

mysqli_close($con);

echo "<br><a href='editBuku.php'>Back To Edit Buku Page</a>"
?>