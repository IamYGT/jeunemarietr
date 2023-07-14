<?php
include("include/baglan.php");
include("include/fonksiyonlar.php");



ob_start();
session_start();


if (isset($_POST["giris"])) {
			$email_adres  = $_POST["email"];    
				$sifre = $_POST["sifre"];
				$hatirla = $_POST["hatirla"];
				
				if (empty($email_adres) || empty($sifre)) {
              	$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> E-Mail yada Şifre Boş Olamaz.
						   </div>' ;
				}else {
				    $sifre = sha1($sifre);
					$query = $db->prepare("SELECT * FROM yonetici WHERE eposta = :eposta AND sifre = :sifre");
              		$query->execute(array('eposta' => $email_adres,'sifre' => $sifre));
              		$result = $query->fetch(PDO::FETCH_ASSOC);	
					
					if($query->rowCount()){ 
					$_SESSION["ad_soyad"]  =  $result["ad_soyad"];
					$_SESSION["eposta"] =  $result["eposta"];
					

					$_SESSION["id"]   =  $result["id"];
					
					$id = $result["id"] ;
					
					$update = $db->prepare("UPDATE yonetici SET 
						son_giris 	= :son_giris
						WHERE 
						id 			= :id
					");
					$result = $update->execute(
						array(
							'son_giris'	=>$tarih,
							'id'   		=>$id
						)); 
					
					
					if($hatirla==1)
					{
						setcookie("hatirla",$email_adres,time()+2592000);
					}
					
			
				 	header("location:./index.php?durum=Basarili");
  }else{
					header("location:".$_POST['link'].'?durum=Basarisiz');
				  }	
									
				}
				
}

		
		
?>
<!DOCTYPE html>
<html lang="tr">



<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../resimler/<?=$favicon?>" type="image/png" />
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Giriş Yap - <?=$title?></title>
	 <script type="text/javascript" src="sweetalert2.all.min.js"></script>
</head>

<body>
    <?php 
if (@$_GET['durum']=="Basarisiz") { ?>
<script>Swal.fire("Başarız", "HATA, Giriş Bilgileriniz Yanlış !", "error"); </script>
<?php } ?>
	 <?php 
if (@$_GET['durum']=="CikisBasarili") { ?>
<script>Swal.fire("Başarılı", "Çıkış Başarılı", "success"); </script>
<?php } ?>
	<div class="wrapper">
		<div class="authentication-header"></div>
		 <div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
					    <form method="post">
						<div class="row g-0">
							<div class="col-lg-6 border-end">
								<div class="card-body">
									<div class="p-5">
										<div class="text-start">
											<img src="../resimler/<?=$logo?>" width="180" alt="<?=$title?>">
										</div>
										<h4 class="mt-5 font-weight-bold"><?=$title?> Yönetim Paneli</h4>
										<div class="mb-3 mt-5">
											<label class="form-label">Kullanıcı Email </label>
											<input type="text" class="form-control" name="email" />
											<input type="hidden" name="link" value="../giris-yap.php">
										</div>
										<div class="mb-3">
											<label class="form-label">Şifre</label>
											<input type="password" class="form-control"  name="sifre"/>
										</div>
										<div class="d-grid gap-2">
										<button type="submit" class="btn btn-light" name="giris"><i class='bx bx-arrow-right mr-1'></i>Giriş Yap</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="assets/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>


</html>