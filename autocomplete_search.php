<table class = "table table-striped">
  <tr>
   <th scope="col">Nomor</th>
   <th scope="col">Nama Buku</th>
  </tr>
<?php
$con = mysqli_connect('localhost','root','','db_buku');
$q = mysqli_query($con, "SELECT Nama_Buku FROM list_buku WHERE Nama_Buku LIKE '%$_GET[cari]%'");
$no = 1;

while ($d = mysqli_fetch_array($q)) {
?>
  <tr>
   <td scope="row"><?=$no;?></td>
   <td><?=$d['Nama_Buku'];?></td>
  </tr>
<?php
$no++;
}
?>
 </table>