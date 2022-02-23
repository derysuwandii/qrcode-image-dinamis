<?php
//library phpqrcode
include "phpqrcode/qrlib.php";

//direktory tempat menyimpan hasil generate qrcode jika folder belum dibuat maka secara otomatis akan membuat terlebih dahulu
$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

?>
<html>
<head>
</head>
<body>

    <form action="" method="POST">
        <p>Masukkan Teks</p>
        <input type="text" name="teks" required="">

        <input type="submit" name="submit">    
    </form>


    <?php
        if (isset($_POST['submit'])) {
            $teks = stripslashes($_POST['teks']);
            echo "<p>Hasil Generate QRCode dari teks : <b>$teks</b></p>";

            //Isi dari QRCode Saat discan
            $isi_teks = $teks;
            //Nama file yang akan disimpan pada folder temp 
            $namafile = $teks.".png";
            //Kualitas dari QRCode 
            $quality = 'H'; 
            //Ukuran besar QRCode
            $ukuran = 8; 
            $padding = 0; 
            QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

            echo "<img src='temp/$namafile' width='200px'>";
        }
    ?>

</body>
</html>
