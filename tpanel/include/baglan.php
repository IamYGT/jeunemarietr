<?php
// veritabanı bağlantısı için gerekli parametreler






$site = 'http://akhantextil.com/';

//upload dosya yolu
$targetFolder = '/resimler/';





$host = "localhost";
$vt_adi = "seyhanweb_jeunemarietr";
$kullanici_adi = "jeunemarietr";
$sifre = "seyhanweb_jeunemarietr";
try {
 $db = new PDO("mysql:host={$host};dbname={$vt_adi}", $kullanici_adi, $sifre,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
// hatayı göster
catch(PDOException $exception){
 echo "Bağlantı hatası: " . $exception->getMessage();
}
error_reporting(0);
?>