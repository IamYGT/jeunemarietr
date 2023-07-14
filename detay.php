<?php
include("tpanel/include/baglan.php");
include("tpanel/include/fonksiyonlar.php");
$seo = $_GET['seo'];
if($seo=='iletisim'){
	$adi ="İletişim";
}else if($seo=='blog'){
	$adi ="Blog";
}else if($seo=='galeri'){
	$adi ="Galeri";
}else if($seo=='referanslar'){
	$adi ="Referanslar";
}else if($seo=='ekibimiz'){
	$adi ="Ekibimiz";
}else if($seo=='urunler'){
	$adi ="Ürünler";
}else if($seo=='sss'){
	$adi ="S.S.S";
}else if($seo=='hizmetler'){
	$adi ="Hizmetler";
}else if($sayfalar=$db->query("select * from sayfalar where seo='$seo' and tur='sayfalar'")->fetch(PDO::FETCH_ASSOC)){
	$adi = $sayfalar['adi'];
	$desc = $sayfalar['onaciklama'];
}else if($haberler=$db->query("select * from haberler where seo='$seo' and tur='haberler'")->fetch(PDO::FETCH_ASSOC)){
	$adi = $haberler['adi'];
	$desc = $haberler['onaciklama'];
}else if($urunler=$db->query("select * from urunler where seo='$seo' and tur='urunler'")->fetch(PDO::FETCH_ASSOC)){
	$adi = $urunler['adi'];
	$desc = $urunler['onaciklama'];
	$id = $urunler['id'];
	$katid = $urunler['kategori'];
	$katlar=$db->query("select * from urun_kategori where id='$katid'")->fetch(PDO::FETCH_ASSOC);
}else if($urun_kategori=$db->query("select * from urun_kategori where seo='$seo' and tur='urun_kategori'")->fetch(PDO::FETCH_ASSOC)){
	$adi = $urun_kategori['adi'];
	$desc = $urun_kategori['onaciklama'];
	$id = $urun_kategori['id'];
}else if($hizmetler=$db->query("select * from hizmetler where seo='$seo' and tur='hizmetler'")->fetch(PDO::FETCH_ASSOC)){
	$adi = $hizmetler['adi'];
	$desc = $hizmetler['onaciklama'];
		$id = $hizmetler['id'];
}else {
	$adi ="404";	
}
?>


<!DOCTYPE html>

<html class="no-js">

<head>
	<title><?=$adi?> - <?=$title?></title>
	<meta charset="utf-8">

	<meta name="description" content="<?=$description?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<link rel="icon" href="resimler/<?=$favicon?>" type="image/png" />


</head>

<body>
	


	<div id="canvas">
		<div id="box_wrapper">
			
		  <?php
     include("inc/header.php");
	   include("detay/beadcrumb.php");
	  if($seo=='iletisim'){
		  include("detay/iletisim.php");
	  }else if($seo=='blog'){
		  include("detay/blog.php");
	  }else if($seo=='referanslar'){
		  include("detay/referanslar.php");
	  }else if($seo=='galeri'){
		  include("detay/galeri.php");
	  }else if($seo=='ekibimiz'){
		  include("detay/ekibimiz.php");
	  }else if($seo=='sss'){
		  include("detay/sss.php");
	  }else if($seo=='urunler'){
		  include("detay/urunler.php");
	  }else if($seo=='hizmetler'){
		  include("detay/hizmetler.php");
	  }else if($sayfalar['adi']!=''){
	  		include("detay/sayfa-detay.php");
	  }else if($urun_kategori['adi']!=''){
	  		include("detay/urunler.php");
	  }else if($haberler['adi']!=''){
	  		include("detay/blog-detay.php");
	  }else if($urunler['adi']!=''){
	  		include("detay/urun-detay.php");
	  }else if($hizmetler['adi']!=''){
	  		include("detay/hizmet-detay.php");
	  }else {
			include("detay/404.php");  
	  }
	 include("inc/footer.php");
	   ?>
			
			
			
			
			
			
			
		
		</div>
	</div>
	

	<script src="js/compressed.js"></script>
	<script src="js/selectize.min.js"></script>
	<script src="js/main.js"></script>

</body>


</html>