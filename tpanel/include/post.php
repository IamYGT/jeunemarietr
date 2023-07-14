<?php
include("baglan.php");
include("fonksiyonlar.php");




if(isset($_POST['ayar-kaydet'])){
    

	

	
	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['site_title']);






	$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['logo']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = 1;
		$ayar_kaydi = $db->query("SELECT * FROM genel_ayarlar WHERE id = '$duzenlenecek_id'")->fetch(PDO::FETCH_ASSOC);
		$logo = $ayar_kaydi['logo'];
	}
	else
	{
		if ($_FILES["logo"]["type"] =="image/gif" || $_FILES["logo"]["type"] =="image/png"|| $_FILES["logo"]["type"] =="image/jpg"|| $_FILES["logo"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM genel_ayarlar WHERE id = '$duzenlenecek_id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['logo']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['logo']);	  
			}
			
			$random = rand(0,995959999);
			
			$logo = $random."-".$seo.".".substr($_FILES['logo']['name'], -3);
			
			move_uploaded_file($_FILES['logo']['tmp_name'],$klasor."/".$logo);
			
			
		




			
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
	
	$resim_tmp1 = $_FILES['footer_logo']['tmp_name'];
	
	if(empty($resim_tmp1))
	{
		$duzenlenecek_id = 1;
		$ayar_kaydi = $db->query("SELECT * FROM genel_ayarlar WHERE id = '$duzenlenecek_id'")->fetch(PDO::FETCH_ASSOC);
		$footer_logo = $ayar_kaydi['footer_logo'];
	}
	else
	{
		if ($_FILES["footer_logo"]["type"] =="image/gif" || $_FILES["footer_logo"]["type"] =="image/png"|| $_FILES["footer_logo"]["type"] =="image/jpg"|| $_FILES["footer_logo"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM genel_ayarlar WHERE id = '$duzenlenecek_id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['footer_logo']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['footer_logo']);	  
			}
			
			$random = rand(0,995959999);
			
			$footer_logo = $random."-".$seo.".".substr($_FILES['footer_logo']['name'], -3);
			
			move_uploaded_file($_FILES['footer_logo']['tmp_name'],$klasor."/".$footer_logo);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
	
	$resim_tmp2 = $_FILES['favicon']['tmp_name'];
	
	if(empty($resim_tmp2))
	{
		$duzenlenecek_id = 1;
		$ayar_kaydi = $db->query("SELECT * FROM genel_ayarlar WHERE id = '$duzenlenecek_id'")->fetch(PDO::FETCH_ASSOC);
		$favicon = $ayar_kaydi['favicon'];
	}
	else
	{
		if ($_FILES["favicon"]["type"] =="image/gif" || $_FILES["favicon"]["type"] =="image/png"|| $_FILES["favicon"]["type"] =="image/jpg"|| $_FILES["favicon"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM genel_ayarlar WHERE id = '$duzenlenecek_id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['favicon']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['favicon']);	  
			}
			
			$random = rand(0,995959999);
			
			$favicon = $random."-".$seo.".".substr($_FILES['favicon']['name'], -3);
			
			move_uploaded_file($_FILES['favicon']['tmp_name'],$klasor."/".$favicon);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	

	
	
	$ekle  = $db->prepare("update genel_ayarlar set head=:head,renk2=:renk2,renk1=:renk1,copyright=:copyright,site_title=:site_title,site_description=:site_description,site_author=:site_author,site_keyword=:site_keyword,logo=:logo,favicon=:favicon,footer_logo=:footer_logo where id=:id");
	
	$simdi = $ekle->execute(array("head"=>$_POST['head'],"renk2"=>$_POST['renk2'],"renk1"=>$_POST['renk1'],"copyright"=>$_POST['copyright'],"site_title"=>$_POST['site_title'],"site_description"=>$_POST['site_description'],"site_author"=>$_POST['site_author'],"site_keyword"=>$_POST['site_keyword'],"logo"=>$logo,"footer_logo"=>$footer_logo,"favicon"=>$favicon,"id"=>"1"));
	
	
if($simdi){
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}

}

if(isset($_POST['iletisim-kaydet'])){
    
    $ekle =$db->prepare("update iletisim_bilgileri set googlemaps=:googlemaps,whatsapp=:whatsapp,telefon1=:telefon1,telefon2=:telefon2,email1=:email1,email2=:email2,adres1=:adres1,adres2=:adres2,facebook=:facebook,instagram=:instagram,
    youtube=:youtube,telegram=:telegram,twitter=:twitter,linkedin=:linkedin where id=:id");
    $simdi =$ekle->execute(array("googlemaps"=>$_POST['googlemaps'],"whatsapp"=>$_POST['whatsapp'],"telefon1"=>$_POST['telefon1'],"telefon2"=>$_POST['telefon2'],"email1"=>$_POST['email1'],"email2"=>$_POST['email2'],"adres1"=>$_POST['adres1'],"adres2"=>$_POST['adres2'],"facebook"=>$_POST['facebook'],
    "instagram"=>$_POST['instagram'],"youtube"=>$_POST['youtube'],"telegram"=>$_POST['telegram'],"twitter"=>$_POST['twitter'],"linkedin"=>$_POST['linkedin'],"id"=>"1"));
    
    
  if($simdi){
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
    
}

if(isset($_POST['urun-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="urunler";
     $ekle =$db->prepare("insert into urunler set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from urunler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['urun-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM urunler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM urunler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="urunler";
     $ekle =$db->prepare("update urunler set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='urunler'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['urun-kategori-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="urun_kategori";
     $ekle =$db->prepare("insert into urun_kategori set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from urun_kategori order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['urun-kategori-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM urun_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM urun_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="urun_kategori";
     $ekle =$db->prepare("update urun_kategori set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='urunler'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['haber-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="haberler";
     $ekle =$db->prepare("insert into haberler set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from haberler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['haber-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM haberler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM haberler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="haberler";
     $ekle =$db->prepare("update haberler set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='haberler'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['haber-kategori-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="haber_kategori";
     $ekle =$db->prepare("insert into haber_kategori set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from haber_kategori order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['haber-kategori-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM haber_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM haber_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="haber_kategori";
     $ekle =$db->prepare("update haber_kategori set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='urunler'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['hizmet-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="hizmetler";
     $ekle =$db->prepare("insert into hizmetler set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from hizmetler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['hizmet-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM hizmetler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM hizmetler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="hizmetler";
     $ekle =$db->prepare("update hizmetler set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='hizmetler'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['hizmet-kategori-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="hizmet_kategori";
     $ekle =$db->prepare("insert into hizmet_kategori set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from hizmet_kategori order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['hizmet-kategori-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM hizmet_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM hizmet_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="hizmet_kategori";
     $ekle =$db->prepare("update hizmet_kategori set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='hizmet_kategori'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['sss-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="sss";
     $ekle =$db->prepare("insert into sss set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from sss order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['sss-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM sss WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM sss WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="sss";
     $ekle =$db->prepare("update sss set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='sss'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['galeri-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="galeri";
     $ekle =$db->prepare("insert into galeri set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from galeri order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['galeri-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM galeri WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM galeri WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="galeri";
     $ekle =$db->prepare("update galeri set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='galeri'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['sayfa-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="sayfalar";
     $ekle =$db->prepare("insert into sayfalar set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from sayfalar order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['sayfa-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM sayfalar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM sayfalar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="sayfalar";
     $ekle =$db->prepare("update sayfalar set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='sayfalar'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['ekip-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="ekibimiz";
     $ekle =$db->prepare("insert into ekibimiz set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from ekibimiz order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['ekip-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM ekibimiz WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM ekibimiz WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="ekibimiz";
     $ekle =$db->prepare("update ekibimiz set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='ekibimiz'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['slider-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="slider";
     $ekle =$db->prepare("insert into slider set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from slider order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['slider-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM slider WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM slider WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="slider";
     $ekle =$db->prepare("update slider set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='slider'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['yorum-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="yorumlar";
     $ekle =$db->prepare("insert into yorumlar set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from yorumlar order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['yorum-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM yorumlar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM yorumlar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="yorumlar";
     $ekle =$db->prepare("update yorumlar set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='yorumlar'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['istatik-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim);
			
			      
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="istatik";
     $ekle =$db->prepare("insert into istatik set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from istatik order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['istatik-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM istatik WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM istatik WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
		

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="istatik";
     $ekle =$db->prepare("update istatik set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='istatik'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['smtp-kaydet'])){
    $ekle =$db->prepare("update smtp set site_mail=:site_mail,site_mail_sifre=:site_mail_sifre,site_mail_host=:site_mail_host,site_mail_port=:site_mail_port,gonderen_mail=:gonderen_mail where id=:id");
    $simdi = $ekle->execute(array("site_mail"=>$_POST['site_mail'],"site_mail_sifre"=>$_POST['site_mail_sifre'],"site_mail_host"=>$_POST['site_mail_host'],"site_mail_port"=>$_POST['site_mail_port'],"gonderen_mail"=>$_POST['gonderen_mail'],"id"=>1));
    if($simdi){
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['modul-kaydet'])){
    $ekle = $db->prepare("update izinler set en=:en,urun_durum=:urun_durum,kategori_durum=:kategori_durum,istatik_durum=:istatik_durum,ref_durum=:ref_durum,hizmet_durum=:hizmet_durum,haber_durum=:haber_durum,sayfa_durum=:sayfa_durum,slider_durum=:slider_durum,sss_durum=:sss_durum,galeri_durum=:galeri_durum,video_durum=:video_durum,ekip_durum=:ekip_durum,yorum_durum=:yorum_durum,iletisim_durum=:iletisim_durum where id=:id");
	$simdi =$ekle->execute(array("en"=>$_POST['en'],"urun_durum"=>$_POST['urun_durum'],"kategori_durum"=>$_POST['kategori_durum'],"istatik_durum"=>$_POST['istatik_durum'],"ref_durum"=>$_POST['ref_durum'],"hizmet_durum"=>$_POST['hizmet_durum'],"haber_durum"=>$_POST['haber_durum'],"sayfa_durum"=>$_POST['sayfa_durum'],"slider_durum"=>$_POST['slider_durum'],"sss_durum"=>$_POST['sss_durum'],"galeri_durum"=>$_POST['galeri_durum'],"video_durum"=>$_POST['video_durum'],"ekip_durum"=>$_POST['ekip_durum'],"yorum_durum"=>$_POST['yorum_durum'],"iletisim_durum"=>$_POST['iletisim_durum'],"id"=>"1"));
      if($simdi){
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
    
    
    
}


if(isset($_POST['ref-ekle'])){
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


 $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim);
			
			      
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="referanslar";
     $ekle =$db->prepare("insert into referanslar set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur));
     if($simdi){
         
         
         		  $sonid=$db->query("select * from referanslar order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
         
         
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['ref-guncelle'])){
    $id = $_POST['id'];
    
    	function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


	$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM referanslar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM referanslar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim= $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
		
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	

    
    $tur ="referanslar";
     $ekle =$db->prepare("update referanslar set fiyat=:fiyat,tarih=:tarih,sira=:sira,adi=:adi,kategori=:kategori,linki=:linki,etiket=:etiket,onaciklama=:onaciklama,durum=:durum,resim=:resim,aciklama=:aciklama,seo=:seo,tur=:tur where id=:id");
     $simdi =$ekle->execute(array("fiyat"=>$_POST['fiyat'],"tarih"=>$tarih,"sira"=>$_POST['sira'],"adi"=>$_POST['adi'],"kategori"=>$_POST['kategori'],"linki"=>$_POST['linki'],"etiket"=>$_POST['etiket'],"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"resim"=>$resim,"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"id"=>$_POST['id']));
     if($simdi){
         
         
         		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='referanslar'");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {

    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}


if(isset($_POST['yonetici-ekle'])){
    
    $sifre = sha1($_POST['sifre']);
    
    $ekle = $db->prepare("insert into yonetici set eposta=:eposta,sifre=:sifre,normalsifre=:normalsifre");
    $simdi = $ekle->execute(array("eposta"=>$_POST['eposta'],"sifre"=>$sifre,"normalsifre"=>$_POST['sifre']));
    
     if($simdi){
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

if(isset($_POST['yonetici-guncelle'])){
    
    $sifre = sha1($_POST['sifre']);
    
    $ekle = $db->prepare("update  yonetici set eposta=:eposta,sifre=:sifre,normalsifre=:normalsifre where id=:id");
    $simdi = $ekle->execute(array("eposta"=>$_POST['eposta'],"sifre"=>$sifre,"normalsifre"=>$_POST['sifre'],"id"=>$_POST['id']));
    
     if($simdi){
		header("location:".$_POST['link'].'?durum=Basarili');
	}else {
		header("location:".$_POST['link'].'?durum=Basarisiz');
	}
}

?>