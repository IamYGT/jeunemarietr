<?php
include("tpanel/include/baglan.php");
include("tpanel/include/fonksiyonlar.php");

?>


<!DOCTYPE html>

<html class="no-js">

<head>
	<title><?=$title?></title>
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
            if($izinler['slider_durum']==0){
			include("inc/slider.php");
            }if($izinler['sayfa_durum']==0){
			include("inc/hakkimizda.php");
            }if($izinler['urun_durum']==0){
			include("inc/urunler.php");
            }if($izinler['iletisim_durum']==0){
			include("inc/form.php");
            }if($izinler['yorum_durum']==0){
			include("inc/yorumlar.php");
            }if($izinler['haber_durum']==0){
			include("inc/blog.php");
            }
			include("inc/sosyal.php");
			include("inc/abone.php");
            if($izinler['galeri_durum']==0){
			include("inc/galeri.php");
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