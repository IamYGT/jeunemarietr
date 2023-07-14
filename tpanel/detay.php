<?php
include("include/baglan.php");
include("include/fonksiyonlar.php");
ob_start();
session_start();
oturumkontrolana();

$seo = $_GET['seo'];
if($seo=='genel-ayarlar'){
 $adi ="Genel Ayarlar";   
}else if($seo=='iletisim-bilgileri'){
    $adi ="İletişim Bilgileri";
}else if($seo=='urun-ekle'){
    $adi ="Ürün Ekle";
}else if($seo=='urun-listele'){
    $adi ="Ürün Listele";
}else if($seo=='urun-kategori-ekle'){
    $adi ="Ürün Kategori Ekle";
}else if($seo=='urun-kategori-listele'){
    $adi ="Ürün Kategori Listele";
}else if($seo=='haber-kategori-ekle'){
    $adi ="Haber Kategori Ekle";
}else if($seo=='haber-kategori-listele'){
    $adi ="Haber Kategori Listele";
}else if($seo=='haber-ekle'){
    $adi ="Haber Ekle";
}else if($seo=='haber-listele'){
    $adi ="Haber Listele";
}else if($seo=='hizmet-ekle'){
    $adi ="Hizmet Ekle";
}else if($seo=='hizmet-listele'){
    $adi ="Hizmet Listele";
}else if($seo=='hizmet-kategori-ekle'){
    $adi ="Hizmet Kategori Ekle";
}else if($seo=='hizmet-kategori-listele'){
    $adi ="Hizmet Kategori Listele";
}else if($seo=='sss-ekle'){
    $adi ="SSS Ekle";
}else if($seo=='sss-listele'){
    $adi ="SSS Listele";
}else if($seo=='galeri-ekle'){
    $adi ="Galeri Ekle";
}else if($seo=='galeri-listele'){
    $adi ="Galeri Listele";
}else if($seo=='sayfa-ekle'){
    $adi ="Sayfa Ekle";
}else if($seo=='sayfa-listele'){
    $adi ="Sayfa Listele";
}else if($seo=='ekibimiz-ekle'){
    $adi ="Ekibimiz Ekle";
}else if($seo=='ekibimiz-listele'){
    $adi ="Ekibimiz Listele";
}else if($seo=='slider-ekle'){
    $adi ="Slider Ekle";
}else if($seo=='slider-listele'){
    $adi ="Slider Listele";
}else if($seo=='yorum-ekle'){
    $adi ="Yorum Ekle";
}else if($seo=='yorum-listele'){
    $adi ="Yorum Listele";
}else if($seo=='istatik-ekle'){
    $adi ="İstatik Ekle";
}else if($seo=='istatik-listele'){
    $adi ="İstatik Listele";
}else if($seo=='smtp-ayarlari'){
    $adi ="SMTP Ayarları ";
}else if($seo=='modul-ayarlari'){
    $adi ="Modül Ayarları ";
}else if($seo=='referans-ekle'){
    $adi ="Referans Ekle";
}else if($seo=='referans-listele'){
    $adi ="Referans Listele";
}else if($seo=='yonetici-ekle'){
    $adi ="Yönetici Ekle";
}else if($seo=='yonetici-listele'){
    $adi ="Yönetici Listele";
}
?>
<!doctype html>
<html lang="tr">


<head>
	<meta charset="utf-8">
	
 <link rel="stylesheet" href="ifancybox/jquery.fancybox.css" />
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="ifancybox/jquery.fancybox.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../resimler/<?=$favicon?>" type="image/png" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/css/pace.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title><?=$adi?> - <?=$title?></title>
	 <script type="text/javascript" src="sweetalert2.all.min.js"></script>
	<link href="assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
	
  <script src="ckeditor-2/ckeditor.js"></script>
</head>
 

<body>
	<div class="wrapper">
	 <?php 
if (@$_GET['durum']=="Basarili") { ?>
<script>Swal.fire("Başarılı", "Kaydetme Başarılı", "success"); </script>
<?php } ?>


<?php 
if (@$_GET['durum']=="Basarisiz") { ?>
<script>Swal.fire("Başarız", "HATA, Kaydetme Başarısız !", "error"); </script>
<?php } ?>
		<?php
	
		include("detay/header.php");
	
		?>

		<div class="page-wrapper">
			<div class="page-content">
				<?php
				
		include("detay/beadcrumb.php");
				
		if($seo=='genel-ayarlar'){
		    include("detay/genel-ayarlar.php");
		    
		}else if($seo=='iletisim-bilgileri'){
		    include("detay/iletisim-bilgileri.php");
		}else if($seo=='urun-ekle'){
		    include("detay/urun-ekle.php");
		}else if($seo=='urun-listele'){
		    include("detay/urun-listele.php");
		}else if($seo=='urun-kategori-ekle'){
		    include("detay/urun-kategori-ekle.php");
		}else if($seo=='urun-kategori-listele'){
		    include("detay/urun-kategori-listele.php");
		}else if($seo=='haber-kategori-ekle'){
		    include("detay/haber-kategori-ekle.php");
		}else if($seo=='haber-kategori-listele'){
		    include("detay/haber-kategori-listele.php");
		}else if($seo=='haber-ekle'){
		    include("detay/haber-ekle.php");
		}else if($seo=='haber-listele'){
		    include("detay/haber-listele.php");
		}else if($seo=='hizmet-ekle'){
		    include("detay/hizmet-ekle.php");
		}else if($seo=='hizmet-listele'){
		    include("detay/hizmet-listele.php");
		}else if($seo=='hizmet-kategori-ekle'){
		    include("detay/hizmet-kategori-ekle.php");
		}else if($seo=='hizmet-kategori-listele'){
		    include("detay/hizmet-kategori-listele.php");
		}else if($seo=='sss-ekle'){
		    include("detay/sss-ekle.php");
		}else if($seo=='sss-listele'){
		    include("detay/sss-listele.php");
		}else if($seo=='galeri-ekle'){
		    include("detay/galeri-ekle.php");
		}else if($seo=='galeri-listele'){
		    include("detay/galeri-listele.php");
		}else if($seo=='sayfa-ekle'){
		    include("detay/sayfa-ekle.php");
		}else if($seo=='sayfa-listele'){
		    include("detay/sayfa-listele.php");
		}else if($seo=='ekibimiz-ekle'){
		    include("detay/ekibimiz-ekle.php");
		}else if($seo=='ekibimiz-listele'){
		    include("detay/ekibimiz-listele.php");
		}else if($seo=='slider-ekle'){
		    include("detay/slider-ekle.php");
		}else if($seo=='slider-listele'){
		    include("detay/slider-listele.php");
		}else if($seo=='yorum-ekle'){
		    include("detay/yorum-ekle.php");
		}else if($seo=='yorum-listele'){
		    include("detay/yorum-listele.php");
		}else if($seo=='giris-yap'){
		    include("detay/giris-yap.php");
		}else if($seo=='istatik-listele'){
		    include("detay/istatik-listele.php");
		}else if($seo=='istatik-ekle'){
		    include("detay/istatik-ekle.php");
		}else if($seo=='smtp-ayarlari'){
		    include("detay/smtp-ayarlari.php");
		}else if($seo=='modul-ayarlari'){
		    include("detay/modul-ayarlari.php");
		}else if($seo=='referans-ekle'){
		    include("detay/referans-ekle.php");
		}else if($seo=='referans-listele'){
		    include("detay/referans-listele.php");
		}else if($seo=='yonetici-ekle'){
		    include("detay/yonetici-ekle.php");
		}else if($seo=='yonetici-listele'){
		    include("detay/yonetici-listele.php");
		}
		
		
		?>

			
			
			</div>
		</div>
	<div id="queue"></div>
		<div class="overlay toggle-icon"></div>
	 <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	
	<?php
		include("detay/footer.php");
		?>
	</div>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/js/app.js"></script>
		<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
			<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
		<script src="assets/plugins/input-tags/js/tagsinput.js"></script>
	
	<link rel="stylesheet" href="assets/uploadfive/uploadifive.css" type="text/css">
    	<script src="assets/uploadfive/jquery.uploadifive.min.js" type="text/javascript"></script>
    		<script type="text/javascript">
	    $(document).ready(function(){

	      	var date = new Date();
	        var date_time = date.getTime();
	        $('.upload .icon span').uploadifive({
	            'auto'             : true,
	            'queueID'  : 'queue',
	            'fileSizeLimit' : '15360KB',
	            'fileExt'     : '*.jpg;*.jpeg;*.JPG;*.JPEG;*.png;*.PNG;*.svg;*.gif',
	            'width' : 25,
	            'buttonText' : " ",
	            'formData'         : {'timestamp' : date_time,'token' : 'sayim'+date_time+'sayim'},
	            'uploadScript'     : 'assets/uploadfive/uploadifive.php',
	            'removeCompleted' : true,
	            'onUploadComplete' : function(file, data) {
	                if(data == '2'){
	                    alert('Lütfen Geçerli Fortmatta Yükleme Yapınız.');
	                }else if(data == '3'){
	                    alert('İşlem Başarısız.(Dosya Boyutu İle Alakalı Olabilir.)');
	                }else{
	                    var id = $(this).attr('data-id');
	                    $('input[name="img'+id+'"]').val(data);
	                    $('#url').val('<?php echo $site; ?>resimler/'+data);
	                    $('.uploaddis[data-id="'+id+'"] .yuklendi img').attr('src','../resimler/'+data);
	                    $('.uploaddis[data-id="'+id+'"]').removeClass('aktif');
	                    $('.uploaddis[data-id="'+id+'"]').addClass('pasif');
	                }
	            }
	        });

	        $('.upload1 .icon span').uploadifive({
	            'auto'             : true,
	            'queueID'  : 'queue',
	            'fileSizeLimit' : '15360KB',
	            'fileExt'     : '*.jpg;*.jpeg;*.JPG;*.JPEG;*.png;*.PNG;*.svg;*.gif',
	            'width' : 25,
	            'buttonText' : " ",
	            'formData'         : {'timestamp' : date_time,'token' : 'sayim'+date_time+'sayim'},
	            'uploadScript'     : 'assets/uploadfive/uploadifive.php',
	            'removeCompleted' : true,
	            'onUploadComplete' : function(file, data) {
	                if(data == '2'){
	                    alert('Lütfen Geçerli Fortmatta Yükleme Yapınız.');
	                }else if(data == '3'){
	                    alert('İşlem Başarısız.(Dosya Boyutu İle Alakalı Olabilir.)');
	                }else{
	                    var say = $('#resimler .col-md-3').length;
	                    $('#resimler').append('\
	                    	<div class="col-md-3" data-resim-dis-id="'+say+'">\
				                    <div class="uploaddis pasif" style="float:left;">\
				        			  <div class="yuklendi">\
				        				  <img src="../resimler/'+data+'" width="100%">\
				        				  <div class="icon" data-resim-sil-id="'+say+'"><span class="fa fa-trash"></span></div>\
				        				  <input type="hidden" name="img[]" value="'+data+'" required="">\
				        			  </div>\
				        			</div>\
				                </div>\
				        ');

	                }
	            }
	        });
	        $(document).on('click','[data-resim-sil-id]', function(){
	        	$('[data-resim-dis-id="'+$(this).attr('data-resim-sil-id')+'"]').remove();
	        });

	        $('.yuklendi .icon').click(function(){
	            var id = $(this).attr('data-id');
	            $('.uploaddis[data-id="'+id+'"]').removeClass('pasif');
	            $('.uploaddis[data-id="'+id+'"]').addClass('aktif');
	            $('input[name="img'+id+'"]').val('');
	            $('.uploaddis[data-id="'+id+'"] .yuklendi img').attr('src','');
	        });
	      });
	    </script>
        <script src="https://use.fontawesome.com/ca9a29c061.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

</body>



</html>