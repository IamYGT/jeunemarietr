
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
						
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Modül Ayarları   </h6>
									    <hr>
									
										
								    
										<input type="hidden" name="link" value="../modul-ayarlari">
											
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Slider Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="slider_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['slider_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['slider_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Ürünler Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="urun_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['urun_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['urun_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Ürün Kategori Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="kategori_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['kategori_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['kategori_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Haberler Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="haber_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['haber_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['haber_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Haber Kategori Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="haber_kategori_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['haber_kategori_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['haber_kategori_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmetler Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="hizmet_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['hizmet_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['hizmet_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Hizmet Kategori Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="hizmet_kategori_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['hizmet_kategori_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['hizmet_kategori_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
									
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">S.S.S Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="sss_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['sss_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['sss_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Yorum Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="yorum_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['yorum_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['yorum_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Galeri Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="galeri_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['galeri_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['galeri_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">İstatik Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="istatik_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['istatik_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['istatik_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Sayfalar Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="sayfa_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['sayfa_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['sayfa_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Ekibimiz Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="ekip_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['ekip_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['ekip_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">İletişim Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="iletisim_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['iletisim_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['iletisim_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Referans Durum </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<select name="ref_durum" class="form-select mb-3" aria-label="Default select example">
									                <option value="0" <?php if($izinler['ref_durum']==0){ echo "selected";}?>>Aktif</option>
						                           	<option value="1" <?php if($izinler['ref_durum']==1){ echo "selected";}?>>Pasif</option>
							            	</select>
											</div>
										</div>
										
										
								
									
										
										
										
									
										
										
								
									<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="modul-kaydet" value="Modülü Güncelle " />
											</div>
									
									</div>
								</div>
								
							</div>
							
							
							
						</div>
						</form>
					</div>
				</div>