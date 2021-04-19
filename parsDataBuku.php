<?php

    $con = mysqli_connect("localhost", "root", "", "db_buku");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to database : " . mysqli_connect_error();
    }

    $namaTabel = "list_buku";
   
    $query = "SELECT * FROM $namaTabel";
    $hasil = mysqli_query($con,$query);
    
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

    echo "Done parsing!";

    mysqli_close($con);
?>