<?php
    $con = mysqli_connect("localhost", "root","");
	if($con === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql = "CREATE DATABASE db_buku";
    if(mysqli_query($con, $sql)){
		echo "Create successfully"."<br>";
	} else {
		echo "ERROR: " . $sql . "<br>" . mysqli_error($con);
	}

	$link = mysqli_connect("localhost", "root", "", "db_buku");
	if($link === false){
		die("ERROR: could not connect. " .mysqli_connect_error());
	}
	$sql_table = "CREATE TABLE list_Buku(
		ID INT NOT NULL AUTO_INCREMENT,
		Nama_Buku VARCHAR(255) NOT NULL,
		Penulis VARCHAR(255) NOT NULL,
		Penerbit VARCHAR(255) NOT NULL,
		Rating FLOAT(5) NOT NULL,
		Jumlah_Halaman VARCHAR(30) NOT NULL,
		Harga INT(10) NOT NULL,
		Sinopsis VARCHAR(2000) NOT NULL,
		Cover VARCHAR(255) NOT NULL,
		Kategori VARCHAR(40) NOT NULL,
		PRIMARY KEY(ID)
	)";

	if(mysqli_query($link, $sql_table)){
		echo "Create successfully". "<br>";
	} else {
		echo "ERROR: " . $sql_table . "<br>" . mysqli_error($link);
	}
	
	$sql_insert = "INSERT INTO list_Buku(Nama_Buku,Penulis, Penerbit, Rating, Jumlah_Halaman, Harga, Sinopsis, Cover, Kategori) VALUES
		('Algoritma & Pemrograman Menggunakan Java', 'Abdul Kadir', 'ANDI Yogyakarta', '4.5', '288 halaman', '71900', 
		'Buku yang sangat berguna bagi  Anda yang sedang mempelajari Algoritma dan Java, 
		Menggunakan bahasa yang sederharna dan mudah dipahami.' ,
		'DataBuku/buku/Algoritma dan Pemograman menggunakan Java.jpg', 'Edukasi'),
		
		('Kalkulus Edisi Kedelapan Jilid I','Varger Purcel Rigdon', 'Erlangga', '4.0', '457 halaman', '270000', 'Kalkulus jilid I adalah buku yang     
		ditujukan untuk para mahasiswa dari setiap jurusan yang ada di Fakultas MIPA, Teknik, atau bahkan Ekonomi di setiap perguruan tinggi. 
		Para mahasiswa ini selalu membutuhkan pemahaman dasar akan kalkulus yang akan diterapkan pada bidang masing-masing sesuai dengan 
	    program studinya.', 
		'DataBuku/buku/Kalkulus Edisi Kedelapan JilidI.jpg', 'Edukasi'),
		
		('Kamus Bisnis Dan Kewirausahaan', 'Pipin Asropudin', 'CV Titian Ilmu', '3.5', '120 halaman', '35000', 'Buku yang berjudul Kamus bisnis dan   
		Kewirausahaan, berbicara tentang istilah dalam dunia bisnis, baik yang sering kita dengar maupun yang tidak pernah kita dengar. 
		Buku yang ditulis oleh Pipin Asropudin dapat dimiliki oleh siapapun yang ingin menjadi pembisnis maupun yang sudah terjun dalam dunia bisnis.  
		Di zaman sekarang usaha bisnis sangat diminati dari berbagai kalangan, baik dari yang muda maupun yang sudah merintis suatu usaha. 
		Namun, dalam membangun suatu usah kita harus memahami terlebih dulu istilah-istilah dalam dunia bisnis. 
		Sehingga usaha yang kita jalanin bisa berkembang.', 
		'DataBuku/buku/Kamus Bisnis dan Kewirausahaan.jpg', 'Kamus'),
		
		('TESAURUS plus Indonesia-Inggris', 'Aris Mansur Makmur', 'Pt Mizan Publika', '3.7', '540 halaman', '115000', 'Walau bukan berlatar belakang  
		pendidikan Bahasa,  Ia mampu menulis buku ini. Menurut saya hal ini merupakan suatu yang unik dan secara pribadi Saya memberikan acungan 
		“dua jempol”  padanya. Berkat keuletannya selama sepuluh tahun menyusun buku ini, akhirnya buku ini bisa diterbitkan.', 
		'DataBuku/buku/Tesaurus plus Indonesia-Inggris.jpg', 'Kamus'),
		
		('One Piece', 'Eiichiro Oda', 'PT Elex Media Komputindo', '4.0','182 halaman','55800', 'Komik ini menceritakan seorang bajak laut amatiran  
		bernama Luffy yang ingin mencari sebuah harta karun legendaris dengan mencari anggota yang lain agar ikut bergabung. 
		Tetapi mereka semua harus menghadapi banyak rintangan selama di lautan karena ada banyak lautan ganas di berbagai daerah, 
		serta banyak juga bajak laut yang menghadang mereka karena pemikiran berbeda. Mereka semua sendiri pun harus berlatih dan bisa mengeluarkan 
		jurus baru agar lawan-lawan semakin kuat dapat mereka tumbangkan, dan apa yang mereka ambisikan dapat menjadi kenyataan. Walaupun di tengah seri ini 
		ada banyak pengorbanan dari yang Luffy sayangi agar dapat menjadi raja bajak laut.', 
		'DataBuku/buku/One Piece.jpg', 'Komik'),
		
		('Naruto Vol 72', 'Mashashi Kishimoto', 'PT Elex Media Komputindo', '4.1', '193 halaman', '48500', 'Sebagai Ninja muda, Uzumaki Naruto 
		memiliki kebiasaan unik untuk membuat kerusakan dan menjadi pengacau terbesar di Akademi Ninja Shinobi di desa Konohagakure. Dia adalah orang buangan 
		karena ada sesuatu yang khusus tentang dia. Ketika ia masih bayi, orang tua Naruto ,Minato dan Kushina menyegel roh rubah berekor sembilan 
		yang bernama Kurama di dalam tubuh bayi nya. Seiring berjalannya waktu, ia menjadi seorang ninja dengan teman-teman sekelasnya Haruno Sakura dan 
		Uchiha Sasuke. Sekarang, berusia 16 tahun dan Naruto harus menyelamatkan dunia.',
		'DataBuku/buku/Naruto Vol 72.jpg', 'Komik'),
		
		('Membuat Kue Bolu Buah dan Sayur', 'Anti Aprilyanti Suganti', 'Penebar Plus', '4.0', '132 halaman', '25000', 'Kue bolu merupakan salah satu makanan 
		yang digemari banyak orang. Namun, kue bolu yang ditemui masih masih menggunakan bahan-bahan yang kurang menyehatkan sehingga bisa membua badan gemuk. 
		Kombinasi bahan kue dari bahan buah dan sayuran paut anda coba. Oleh karena itu, resep kue bolu yang ada di buku Membuat Kue Bolu Buah dan Sayur ini 
		banyak menggunakan sayuran dan buah-buahan yang pastinya membuat bisa membuat anda sehat serta baik juga untuk jajanan anak-anak. Selain menjadi camilan 
		yang enak, kue bolu juga bisa disajikan sebagai penambah vitamin ke anak-anak.',
		'DataBuku/buku/Kue Bolu buah dan sayur.jpeg', 'Majalah'),
		
		('Motor Trend Indonesia Four Door Miracles', 'Azman Osman', 'Source Interlink Media', '3.1', '118 halaman', '85000', 'Buku ini menjelaskan berbagai 
		macam hal tentang mobil yang terdiri dari trend-trend mobil yang sedang hits, lalu mengenai first_look, ada juga mengenai beberapa Test Drive yang 
		dilakukan, dan model SUV Trend.', 
		'DataBuku/buku/Motor Trend Indonesia.jpg', 'Majalah'),
		
		('Paper Towns', 'John Green', 'Gramedia', '2.5', '360 halaman', '51000', 'Margo Roth Spiegelman dan Quentin Jacobsen bersahabat saat 
		masih berumur sembilan tahun dulu—dikarenakan orangtua mereka bersahabat dan rumah mereka bersebelahan, terkadang mereka juga sering main bersama.
		Margo memang menyukai misteri. Bahkan saat mereka menemukan seorang mayat laki-laki di Jefferson Park, bukannya menjauhi mayat itu, Margo malahan 
		mendekati mayat itu. Berbeda dengan Quentin yang ingin segera pulang ke rumah dan menangis diam-diam tanpa Margo ketahui.',
		'DataBuku/buku/Paper Towns.jpg', 'Novel'),
		
		('The Maze Runner', 'James Dashner', 'Mizan Fantasi', '4.8', '477 halaman', '71900', 'Thomas, seorang anak cerdas yang dikirim ke Glade sama 
		seperti anak-anak lelaki lainnya. Meski menggunakan sudut pandang orang ketiga, rasanya James terlalu Thomas-sentris, maklum karena 
		tokoh yang diplot sebagai pemeran utama adalah Thomas. Thomas datang sebagai Anak-Bawang (Greenie) di Glade. Di sana dia bertemu 
		dengan anak laki-laki dari berbagai ras dan kepribadian. Berkat rasa ingin tahunya, Thomas cepat belajar mengenai kehidupan di Glade. Rasa 
		ingin tahunya itu pula yang membuatnya bercita-cita menjadi seorang Runner.',
		'DataBuku/buku/The Maze Runner.png', 'Novel')";
		
	if(mysqli_query($link, $sql_insert)){
		echo "Insert successfully";
	} else {
		echo "ERROR: " . $sql_insert . "<br>" . mysqli_error($link);
	}
	mysqli_close($link);

?>