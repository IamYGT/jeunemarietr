	<?php
	if($_GET['islem']=='duzenle'){
	    $id = $_GET['id'];
	    $urun=$db->query("select * from hizmet_kategori where id='$id'")->fetch(PDO::FETCH_ASSOC);
	}
	?>
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
						
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Hizmet Kategori Bilgileri   </h6>
									    <hr>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Kategori Sırası</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											    <?php if($_GET['islem']!='duzenle'){?>
											    <input type="hidden" value="../hizmet-kategori-ekle" name="link">
											    <?php } else {?>
											    <input type="hidden" value="../hizmet-kategori-listele" name="link">
											    <?php }?>
												<input type="text" class="form-control" name="sira" value="<?=$urun['sira']?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Kategori Adı </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="adi" value="<?=$urun['adi']?>"/>
											</div>
										</div>
										
											
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Kategorisi </h6>
											</div>
											<div class="col-sm-9 text-secondary">
													<select name="kategori" class="form-select mb-3" aria-label="Default select example">
									<option <?php if(0==$urun['kategori']){?>selected=""<?php }?>value="0">Ana Kategori</option>
								<?php foreach($hizmetkategoricek as $urunkat){?>
								<option <?php if($urunkat['id']==$urun['kategori']){?>selected=""<?php }?> value="<?=$urunkat['id']?>"><?=$urunkat['adi']?></option>
								<?php }?>
								</select>
											</div>
										</div>
										
									
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Kategori Linki  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="linki" value="<?=$urun['linki']?>"/>
											</div>
										</div>
										
										
										
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Kategori Anahtar Kelimeler  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="etiket" data-role="tagsinput" value="<?=$urun['etiket']?>">
											</div>
										</div>
										
										
									
										
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Kategori Ön Açıklama  </h6>
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
									    <h6 class="mb-0 text-uppercase">Kategori Kapak Fotoğrafı  </h6>
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
												<input type="submit" class="btn btn-primary px-4" name="hizmet-kategori-ekle" value="Hizmet Kategori Ekle " />
											</div>
											<?php } else{?>
											<input type="hidden" name="id" value="<?=$_GET['id']?>">
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="hizmet-kategori-guncelle" value="Hizmet Kategori Güncelle " />
											</div>
											<?php }?>
											
										</div>
									
									</div>
								</div>
							</div>
							
								<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									    <h6 class="mb-0 text-uppercase">Hizmet Kategori Açıklama</h6>
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