<?php
include"baglan.php";
function oturumkontrolana(){
	 if (empty($_SESSION["eposta"])){
		 echo '<script language="javascript">window.location="giris-yap.php";</script>'; die();
	 }
	 
}
$tarih = date("d.m.Y");
$saat = date("H:i");


$ayar= $db->query("SELECT * FROM genel_ayarlar Where id='1'")->fetch(PDO::FETCH_ASSOC);
$iletisim= $db->query("SELECT * FROM iletisim_bilgileri Where id='1'")->fetch(PDO::FETCH_ASSOC);
$sayfa= $db->query("SELECT * FROM sayfalar Where seo='hakkimizda'")->fetch(PDO::FETCH_ASSOC);
$smtp= $db->query("SELECT * FROM smtp Where id='1'")->fetch(PDO::FETCH_ASSOC);
$izinler= $db->query("SELECT * FROM izinler Where id='1'")->fetch(PDO::FETCH_ASSOC);


$uruncek= $db->query("SELECT * FROM urunler order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$urunkategoricek= $db->query("SELECT * FROM urun_kategori where kategori='0' order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$habercek= $db->query("SELECT * FROM haberler order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$haberkategoricek= $db->query("SELECT * FROM haber_kategori order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$hizmetcek= $db->query("SELECT * FROM hizmetler order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$hizmetkategoricek= $db->query("SELECT * FROM hizmet_kategori order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$ssscek= $db->query("SELECT * FROM sss order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$galericek= $db->query("SELECT * FROM galeri order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$sayfacek= $db->query("SELECT * FROM sayfalar order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$ekipcek= $db->query("SELECT * FROM ekibimiz order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$slidercek= $db->query("SELECT * FROM slider order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$yorumcek= $db->query("SELECT * FROM yorumlar order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$iletisimcek= $db->query("SELECT * FROM iletisimler order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$istatikcek= $db->query("SELECT * FROM istatik order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$refcek= $db->query("SELECT * FROM referanslar order by id desc")->fetchAll(PDO::FETCH_ASSOC);
$yoneticicek= $db->query("SELECT * FROM yonetici where not id='9' order by id desc")->fetchAll(PDO::FETCH_ASSOC);



$title = $ayar['site_title'];
$description = $ayar['site_description'];
$head = $ayar['head'];
$logo = $ayar['logo'];
$footerlogo = $ayar['footer_logo'];
$favicon  =$ayar['favicon'];
$author  =$ayar['site_author'];
$keyword  =$ayar['site_keyword'];
$copyright = $ayar['copyright'];
$renk1 = $ayar['renk1'];
$renk2 = $ayar['renk2'];





$telefon1 = $iletisim['telefon1'];
$telefon2 = $iletisim['telefon2'];
$adres1 = $iletisim['adres1'];
$adres2 = $iletisim['adres2'];
$email1 = $iletisim['email1'];
$email2 = $iletisim['email2'];
$googlemaps = $iletisim['googlemaps'];
$whatsapp=$iletisim['whatsapp'];
$facebook=$iletisim['facebook'];
$twitter =$iletisim['twitter'];
$youtube=$iletisim['youtube'];
$telegram=$iletisim['telegram'];
$linkedin=$iletisim['linkedin'];
$instagram =$iletisim['instagram'];






if(isset($_POST['iletisim-formu'])){
	
	$ekle = $db->prepare("insert into iletisimler set adsoyad=:adsoyad,konu=:konu,telefon=:telefon,mesaj=:mesaj,email=:email,tarih=:tarih");
	$hemen = $ekle->execute(array("adsoyad"=>$_POST['adsoyad'],"konu"=>$_POST['konu'],"telefon"=>$_POST['telefon'],"mesaj"=>$_POST['mesaj'],"tarih"=>$tarih,"email"=>$_POST['email']));
	
	if($hemen){
	    
	      include '../../class.phpmailer.php';
								$mail = new PHPMailer();
								$mail->IsSMTP();
								$mail->Host = $smtp['site_mail_host'];
                                $mail->Port = $smtp['site_mail_port'];
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
								$mail->Username = $smtp['site_mail'];
								$mail->Password = $smtp['site_mail_sifre'];
								$mail->SetFrom($mail->Username, "İletişim Formu");
								$mail->AddAddress($smtp['gonderen_mail'], $title);
								$mail->CharSet = 'UTF-8';
								$mail->Subject = $_POST['konu'];
								$mail->MsgHTML('İsim:'.$_POST["adsoyad"].'<br/>
												Konu:'.$_POST["konu"].'<br/>
												Telefon:'.$_POST["telefon"].'<br/>
													Mesaj:'.$_POST["mesaj"].'<br/>
												Email:'.$_POST["email"].'<br/>
												Tarih:' .$tarih. '<br/>');
					if($mail->Send()) 
					
					{ echo 
					
					' <br>  &nbsp;  &nbsp;&nbsp;  
					<font style="color:#24b802; font-size:16px;">  Mesajınız başarıyla gönderildi.   </font>
					<br><br>' 
					
					;} 
					
					
					else 
					{ 
					
					echo '<br> &nbsp; &nbsp; 
					
					<font style="color:#FF0004; font-size:16px;">  Mesaj gönderirken bir hata oluştu ve girmiş olduğunuz bilgiler alınamadı. </font> 
					
					<br><br>'. $mail->ErrorInfo;  
 					}
      
		header('location:'.$_POST['link'].'?gonderildi');
	}else {
		header('location:'.$_POST['link'].'?gonderilmedi');	
	}
}


				

/*
$idd=$hizmetd_dizi["id"];
$ip=$_SERVER["REMOTE_ADDR"];
$sor=$db->query("select * from ip_adresi where ip='$ip' and urun_id='$idd'")->fetch(PDO::FETCH_ASSOC);
	if($sor==false){
		if($sor["urun_id"]!=$hizmetd_dizi["id"]){
		$urun_id=$hizmetd_dizi["id"];
		$query=$db->prepare("insert into ip_adresi set ip = :ip, urun_id = :urun_id, zaman = :zaman");
		$insert=$query->execute(array("ip" =>$ip, "urun_id" =>$urun_id, "zaman" =>$tarih ));	
		
		$hitsayisi=$hizmetd_dizi["hit"]+1;
		
		
		$artir = $db->prepare("UPDATE hizmetler SET
		hit = :hit
		WHERE id = :id");
		$update = $artir->execute(array(
			 "hit" => $hitsayisi,
			 "id" => $id
		));
		}
	}
*/



?>