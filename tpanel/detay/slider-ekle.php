	<?php
	if($_GET['islem']=='duzenle'){
	    $id = $_GET['id'];
	    $urun=$db->query("select * from slider where id='$id'")->fetch(PDO::FETCH_ASSOC);
	}
	?>
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
						
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Slider Bilgileri   </h6>
									    <hr>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Slider Sırası</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											    <?php if($_GET['islem']!='duzenle'){?>
											    <input type="hidden" value="../slider-ekle" name="link">
											    <?php } else {?>
											    <input type="hidden" value="../slider-listele" name="link">
											    <?php }?>
												<input type="text" class="form-control" name="sira" value="<?=$urun['sira']?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Slider Adı </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="adi" value="<?=$urun['adi']?>"/>
											</div>
										</div>
										
											
									
										
									
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Slider Linki  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="linki" value="<?=$urun['linki']?>"/>
											</div>
										</div>
										
										
										
										
									
										
									
										
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Slider Ön Açıklama  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea class="form-control" id="inputAddress2"  name="onaciklama" rows="3"><?=$urun['onaciklama']?></textarea>
											</div>
											
											
											
										</div>
										
									
										
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Sitede Göster / Gizle  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<div class="form-check form-switch">
									<input class="form-check-input" name="durum" type="checkbox" id="flexSwitchCheckChecked" <?php if($urun['durum']=='on'){?>checked=""<?php }?>>
							
								</div>
											</div>
											
											
											
										</div>
										
								
									
									</div>
								</div>
								
							</div>
								<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
									    <h6 class="mb-0 text-uppercase">Kapak Fotoğrafı  </h6>
									    <hr>
										<div class="d-flex flex-column align-items-center text-center">
										<a data-fancybox="gallery" href="../resimler/<?=$urun['resim']?>">	<img src="../resimler/<?=$urun['resim']?>" alt="logo" class=" p-1 " width="110"></a>
										<input class="form-control" type="file" name="resim" id="formFile">
										</div>
								<br><br>
						
										<div class="row">
											<div class="col-sm-3"></div>
											<?php if($_GET['islem']!='duzenle'){?>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="slider-ekle" value="Slider Ekle " />
											</div>
											<?php } else{?>
											<input type="hidden" name="id" value="<?=$_GET['id']?>">
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="slider-guncelle" value="Slider Güncelle " />
											</div>
											<?php }?>
											
										</div>
									
									</div>
								</div>
							</div>
							
								<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									    <h6 class="mb-0 text-uppercase">Slider Açıklama  </h6>
									    <hr>
											<div class="row mb-3">
										
										
										
												
													<div class="col-sm-12">
											
											 <textarea  class="ckeditor" name="aciklama"  rows="10"><?=$urun['aciklama']?></textarea>
											 
											            <br><br>    <br><br>                               
                             
											 </div>
											   
                                         
											        

										</div>
										
									
									</div>
								</div>
							</div>
							
						</div>
						</form>
					</div>
				</div>