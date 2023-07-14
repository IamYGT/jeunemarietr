		<?php
	if($_GET['islem']=='duzenle'){
	    $id = $_GET['id'];
	    $urun=$db->query("select * from yonetici where id='$id'")->fetch(PDO::FETCH_ASSOC);
	}
	?>
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
						
							<div class="col-lg-6">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Yönetici Ekle   </h6>
									    <hr>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Yönetici Eposta </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											 <?php if($_GET['islem']!='duzenle'){?>
											    <input type="hidden" value="../yonetici-ekle" name="link">
											    <?php } else {?>
											    <input type="hidden" value="../yonetici-listele" name="link">
											    <?php }?>
											   <input type="hidden" name="id" value="<?=$_GET['id']?>">
												<input type="text" class="form-control" name="eposta" value="<?=$urun['eposta']?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Yönetici Şifre </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											   
												<input type="text" class="form-control" name="sifre" value="<?=$urun['normalsifre']?>" />
											</div>
										</div>
										
										
										
										
									
									
										
									
										
										
								
										
										
								
										<div class="row">
											<div class="col-sm-3"></div>
											<?php if($_GET['islem']!='duzenle'){?>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="yonetici-ekle" value="Yönetici Ekle " />
											</div>
											<?php } else{?>
											<input type="hidden" name="id" value="<?=$_GET['id']?>">
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="yonetici-guncelle" value="Yönetici Güncelle " />
											</div>
											<?php }?>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						</form>
					</div>
				</div>