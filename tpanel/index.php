<?php
include("include/baglan.php");
include("include/fonksiyonlar.php");
ob_start();
session_start();
oturumkontrolana();

if($_GET['sil']){
	$idd=$_GET['sil'];
	 
	 $resim_sorgu=$db->query("select * from iletisimler where id='$idd'")->fetch(PDO::FETCH_ASSOC);

	$simdi=$db->query("delete from iletisimler where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	
	


}


?>
<!doctype html>
<html lang="tr">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../resimler/<?=$favicon?>" type="image/png" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title><?=$title?> - Yönetim Paneli</title>
		 <script type="text/javascript" src="sweetalert2.all.min.js"></script>
</head>

<body>
    
    	 <?php 
if (@$_GET['durum']=="Basarili") { ?>
<script>Swal.fire("Başarılı", "Giriş Başarılı", "success"); </script>
<?php } ?>
	<div class="wrapper">
<?php include("detay/header.php");?>
		<div class="page-wrapper">
			<div class="page-content">
			
			<div class="row row-cols-1 row-cols-lg-4">
			    
			    
			    <?php if($izinler['slider_durum']==0){?>
			    
			    
			    	 <?php
                  $vericek = $db->query("select * from slider",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Slider</p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-film font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
<?php }?>
			    
	  <?php if($izinler['urun_durum']==0){?>		    
	 <?php
                  $vericek = $db->query("select * from urunler",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Ürünler</p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-cart font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
			    
	  <?php if($izinler['urun_kategori_durum']==0){?>	
					
						 <?php
                  $vericek = $db->query("select * from urun_kategori",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Ürün Kategori</p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-cart font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>

<?php }?>
			    
	  <?php if($izinler['haber_durum']==0){?>	

						 <?php
                  $vericek = $db->query("select * from haberler",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Haberler</p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-news font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div><?php }?>
			    
	  <?php if($izinler['haber_kategori_durum']==0){?>	
					
						 <?php
                  $vericek = $db->query("select * from haber_kategori",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Haber Kategori</p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-news font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
					
					<?php }?>
			    
	  <?php if($izinler['hizmet_durum']==0){?>	
					
					
							 <?php
                  $vericek = $db->query("select * from hizmetler",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Hizmetler</p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-abacus font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
			    
	  <?php if($izinler['hizmet_kategori_durum']==0){?>	
						 <?php
                  $vericek = $db->query("select * from hizmet_kategori",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Hizmet Kategori</p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-abacus font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
					
					<?php }?>
			    
	  <?php if($izinler['sss_durum']==0){?>	
					
					
						 <?php
                  $vericek = $db->query("select * from sss",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Sıkça Sorulan Sorular </p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-help-circle font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
			    
	  <?php if($izinler['yorum_durum']==0){?>	
						 <?php
                  $vericek = $db->query("select * from yorumlar",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Müşteri Yorumları </p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-message-alt-detail font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
			    
	  <?php if($izinler['galeri_durum']==0){?>	
						 <?php
                  $vericek = $db->query("select * from galeri",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Galeri </p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-images font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
			    
	  <?php if($izinler['sayfa_durum']==0){?>	
					<?php
                  $vericek = $db->query("select * from sayfalar",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Sayfalar </p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-folder font-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>

<?php }?>
			    
	  <?php if($izinler['ekip_durum']==0){?>	
	<?php
                  $vericek = $db->query("select * from ekibimiz",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Ekibimiz </p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-user-circlefont-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
<?php }?>

 <?php if($izinler['istatik_durum']==0){?>	
	<?php
                  $vericek = $db->query("select * from istatik",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">İstatikler </p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-user-circlefont-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
<?php }?>

<?php if($izinler['ref_durum']==0){?>	
	<?php
                  $vericek = $db->query("select * from referanslar",PDO::FETCH_ASSOC);
				  if($vericek->rowCount()){foreach($vericek as $vericek1){
				  }
				  }
				  $say = $vericek->rowCount();
				  ?>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white" style="text-transform:uppercase!important">Referanslar </p>
										<h5 class="mb-0 text-white"><?=$say?></h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-user-circlefont-30'></i>
									</div>
								</div>
								<div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?=$say?>%"></div>
								</div>
							</div>
						</div>
					</div>
<?php }?>
			    
			    


					
					
					
					
				</div>
			  
		

	

	


				<div class="row">
					<div class="col">
						<div class="card radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">İletişim Formundan Gelenler </h5>
									</div>
								
								</div>

                               <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>ID</th>
											   <th>Ad Soyad </th>
											   <th>Konu</th>
											   <th>Telefon</th>
											   <th>Email</th>
											   <th>Mesaj</th>
											   <th>Tarih</th>
											   <th>İşlem</th>
										   </tr>
									   </thead>
									   <tbody>
									       <?php foreach($iletisimcek as $ilet){?>
										   <tr>
											   <td>#<?=$ilet['id']?></td>
											
											   <td><?=$ilet['adsoyad']?></td>
											   <td><?=$ilet['konu']?></td>
											   <td><?=$ilet['telefon']?></td>
											   <td><?=$ilet['email']?></td>
											   <td><?=$ilet['mesaj']?></td>
											   <td class=""><span class="badge bg-light-success text-success w-100"><?=$ilet['tarih']?></span></td>
										
											   <td>
												<div class="d-flex order-actions">	<a href="?sil=<?=$ilet['id']?>" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
												
												</div>
											   </td>
										   </tr>
						<?php }?>
									   </tbody>
								   </table>
							   </div>
								
							</div>
						</div>
					</div>
				</div><!--end row-->
			
			</div>
		</div>

		<div class="overlay toggle-icon"></div>
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

	<?php include("detay/footer.php");?>
	</div>

	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/highcharts/js/exporting.js"></script>
	<script src="assets/plugins/highcharts/js/variable-pie.js"></script>
	<script src="assets/plugins/highcharts/js/export-data.js"></script>
	<script src="assets/plugins/highcharts/js/accessibility.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index2.js"></script>
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.customers-list');
		new PerfectScrollbar('.store-metrics');
		new PerfectScrollbar('.product-list');
	</script>
</body>


</html>