<?php
    $con = mysqli_connect("localhost", "root", "", "db_buku");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to database : " . mysqli_connect_error();
    }
    // $select = "SELECT * FROM list_buku ORDER BY ID";
    // $row = mysqli_query($con, $select);
    // $counterBuku = 0;
    //biar tau jumlah buku yang ada
         
    $db_name = "db_buku";

    if(isset($_POST["submit"])) {
        

        $title = $_POST['Nama_Buku'];
        $author = $_POST['Penulis'];
        $penerbit = $_POST['Penerbit'];
        $rating = $_POST['Rating'];
        $page = $_POST['Jumlah_Halaman'];
        $price = $_POST['Harga'];
                    
        $sinopsis = $_POST['Sinopsis'];


        $target_dir = "DataBuku/buku/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        echo "<br>";
    

        $kategori = $_POST['Kategori'];
                    
        $insert = "INSERT INTO list_buku (Nama_Buku, Penulis, Penerbit, Rating, Jumlah_Halaman, Harga, Sinopsis, Cover, Kategori) VALUES ('$title','$author','$penerbit','$rating','$page','$price','$sinopsis','$target_file','$kategori')";

        if (mysqli_query($con, $insert)){
            echo "Book '$title' successfully inserted to $db_name. <br>";
        } else {
            echo "Failed." . mysqli_error($con);
        }
    
    }


    $query = "SELECT * FROM list_buku";
    $hasil = mysqli_query($con,$query);
    $jumField = mysqli_num_fields($hasil);
    $sites= array();

    while($data = mysqli_fetch_array($hasil)){
        $sites[] = array('ID' => $data['ID'], 'Nama_Buku' => $data['Nama_Buku'], 'Penulis' => $data['Penulis'] , 'Penerbit'=>$data['Penerbit'], 'Rating' =>$data['Rating'], 'Jumlah_Halaman'=>$data['Jumlah_Halaman'], 'Harga'=>$data['Harga'], 'Sinopsis' => $data['Sinopsis'], 'Kategori'=>$data['Kategori']);
    }

    //parsing data sql -> XML Document
    $document = new DOMDocument();
    $document->formatOutput = true;
    $root = $document->createElement("data");
    $document->appendChild($root);

    foreach($sites as $book){
        $block = $document->createElement("book");

        $ID = $document->createElement("ID");
        $ID->appendChild($document->createTextNode($book['ID']));
        $block->appendChild($ID);

        $Nama_Buku = $document->createElement("Nama_Buku");
        $Nama_Buku->appendChild($document->createTextNode($book['Nama_Buku']));
        $block->appendChild($Nama_Buku);

        $Penulis = $document->createElement("Penulis");
        $Penulis->appendChild($document->createTextNode($book['Penulis']));
        $block->appendChild($Penulis);

        $Penerbit = $document->createElement("Penerbit");
        $Penerbit->appendChild($document->createTextNode($book['Penerbit']));
        $block->appendChild($Penerbit);

        $Rating = $document->createElement("Rating");
        $Rating->appendChild($document->createTextNode($book['Rating']));
        $block->appendChild($Rating);

        $Jumlah_Halaman = $document->createElement("Jumlah_Halaman");
        $Jumlah_Halaman->appendChild($document->createTextNode($book['Jumlah_Halaman']));
        $block->appendChild($Jumlah_Halaman);

        $Harga = $document->createElement("Harga");
        $Harga->appendChild($document->createTextNode($book['Harga']));
        $block->appendChild($Harga);

        $Sinopsis = $document->createElement("Sinopsis");
        $Sinopsis->appendChild($document->createTextNode($book['Sinopsis']));
        $block->appendChild($Sinopsis);

        $Kategori = $document->createElement("Kategori");
        $Kategori->appendChild($document->createTextNode($book['Kategori']));
        $block->appendChild($Kategori);

        $root->appendChild($block);

        $document->save("Data_of_Book.xml");


    }

    echo "<br>Save On XML!<br>";
    mysqli_close($con);
    
echo '<a href="formAddBuku.php">Back to form.</a>';
?>