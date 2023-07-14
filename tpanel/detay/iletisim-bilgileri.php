	
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
						<div class="col-lg-6">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">İletişim Bilgileri   </h6>
									    <hr>
									    
									    	<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Whatsapp </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											    <input type="hidden" value="../iletisim-bilgileri" name="link">
												<input type="text" class="form-control" name="whatsapp" value="<?=$whatsapp?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Telefon 1 </h6>
											</div>
											<div class="col-sm-9 text-secondary">
										
												<input type="text" class="form-control" name="telefon1" value="<?=$telefon1?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Telefon 2 </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="telefon2" value="<?=$telefon2?>"/>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email 1 </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="email1" value="<?=$email1?>"/>
											</div>
										</div>
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email 1 </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="email2" value="<?=$email2?>"/>
											</div>
										</div>
										
										
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Adres 1   </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="adres1" value="<?=$adres1?>"/>
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Adres 2   </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="adres2" value="<?=$adres2?>"/>
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Google Maps    </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea class="form-control" id="inputAddress2"  name="googlemaps" rows="3"><?=$googlemaps?></textarea>
											</div>
										</div>
										
										
									
										
										
										
										
									
									
									</div>
								</div>
								
							</div>
							<div class="col-lg-6">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Sosyal Medya  </h6>
									    <hr>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Facebook </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											   
												<input type="text" class="form-control" name="facebook" value="<?=$facebook?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">İnstagram </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											   
												<input type="text" class="form-control" name="instagram" value="<?=$instagram?>" />
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Youtube </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											   
												<input type="text" class="form-control" name="youtube" value="<?=$youtube?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Telegram </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											   
												<input type="text" class="form-control" name="telegram" value="<?=$telegram?>" />
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Twitter </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											   
												<input type="text" class="form-control" name="twitter" value="<?=$twitter?>" />
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Linkedin </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											   
												<input type="text" class="form-control" name="linkedin" value="<?=$linkedin?>" />
											</div>
										</div>
										
									
									
										
									
										
										
								
										
										
								
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="iletisim-kaydet" value="Kaydet " />
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						</form>
					</div>
				</div>