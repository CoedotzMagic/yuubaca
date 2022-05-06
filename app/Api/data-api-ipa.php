<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'yuubaca';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    printf("Failed to connect to database");
    exit();
}
  
$query="SELECT * FROM buku WHERE kategori = 'IPA'"; 
$result=$mysqli->query($query)
	or die ($mysqli->error);
	
$response = array();
$posts = array();
while($row=$result->fetch_assoc())
{ 
$isbn_buku=$row['isbn']; 
$images_buku=$row['gambar'];
$images_buku_asli = 'http://localhost/yuubaca/public/img/'.$images_buku.'';
$judul_buku=$row['judul'];
$kategori_buku=$row['kategori'];
$tingkatan_baca=$row['tingkatan'];
$file_buku=$row['file'];
$posts[] = array(
    'isbn' => $isbn_buku,
    'gambar' => $images_buku_asli,
    'judul' => $judul_buku, 
    'kategori' => $kategori_buku, 
    'tingkatan' => $tingkatan_baca,
    'file' => $file_buku);
} 

$response = $posts;

$fp = fopen('data-api-ipa.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
header( 'Location: http://localhost/yuubaca/app/Api/data-api-ipa.json' ) ;
?> 