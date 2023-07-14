	<?php
	if($_GET['islem']=='duzenle'){
	    $id = $_GET['id'];
	    $urun=$db->query("select * from hizmetler where id='$id'")->fetch(PDO::FETCH_ASSOC);
	}
	?>
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
						
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Hizmet Bilgileri   </h6>
									    <hr>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Sırası</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											    <?php if($_GET['islem']!='duzenle'){?>
											    <input type="hidden" value="../hizmet-ekle" name="link">
											    <?php } else {?>
											    <input type="hidden" value="../hizmet-listele" name="link">
											    <?php }?>
												<input type="text" class="form-control" name="sira" value="<?=$urun['sira']?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Adı </h6>
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
												<h6 class="mb-0">Hizmet Linki  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="linki" value="<?=$urun['linki']?>"/>
											</div>
										</div>
										
										
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Anahtar Kelimeler  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="etiket" data-role="tagsinput" value="<?=$urun['etiket']?>">
											</div>
										</div>
										
										
									
										
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Ön Açıklama  </h6>
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
												<input type="submit" class="btn btn-primary px-4" name="hizmet-ekle" value="Ürün Ekle " />
											</div>
											<?php } else{?>
											<input type="hidden" name="id" value="<?=$_GET['id']?>">
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="hizmet-guncelle" value="Ürün Güncelle " />
											</div>
											<?php }?>
											
										</div>
									
									</div>
								</div>
							</div>
							
								<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									    <h6 class="mb-0 text-uppercase">Hizmet Açıklama & Fotoğraflar  </h6>
									    <hr>
											<div class="row mb-3">
										
										
										
												
													<div class="col-sm-12">
											
											 <textarea  class="ckeditor" name="aciklama"  rows="10"><?=$urun['aciklama']?></textarea>
											 
											            <br><br>    <br><br>                               
                             
											 </div>
											   
                                             <div class="row" id="resimler">
                            
                            	<div class="form-group row col-md-12" id="resimler">
                            
                            
                            	<?php
									$i = 0;
									
									$iddd=$_GET['id'];
									if($_GET['islem']=='duzenle'){
										$cek = $db->query("SELECT * FROM urun_img WHERE urun_id = '$iddd' and tur='hizmetler' order by id asc", PDO::FETCH_ASSOC);
										if($cek->rowCount()){
											foreach( $cek as $c ){
												echo '<div class="col-md-3" data-resim-dis-id="'.$i.'">
									                    <div class="uploaddis pasif" style="float:left;">
									        			  <div class="yuklendi">
									        				  <img src="../resimler/'.$c['img'].'" width="100%">
									        				  <div class="icon" data-resim-sil-id="'.$i.'"><span class="fa fa-trash"></span></div>
									        				  <input type="hidden" name="img[]" value="'.$c['img'].'" required="">
									        			  </div>
									        			</div>
									                </div>';
									            $i++;
											}
										}
									}
								?>
                            </div>
                            
                            	<div class="form-group row col-md-12">
                             <div class="col-md-4 " style="margin:auto;padding:auto;">
				                    <div class="uploaddis aktif" data-id="1" style="margin:0 auto;">
				        			  <div class="upload1">
				        				  <span class="metin" style="width: 100%;float: left;">Hizmet Resimi Yükle</span>
				        				  <div class="icon"><span class="fa fa-upload" data-id="1"></span></div>
				        			  </div>
				        			</div>
				                </div>
                            
                            
                            </div>
                            
                            
                            
                            
                            
                            
				
					
				</div>
											        

										</div>
										
									
									</div>
								</div>
							</div>
							
						</div>
						</form>
					</div>
				</div>