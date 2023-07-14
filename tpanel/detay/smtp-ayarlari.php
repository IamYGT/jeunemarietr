	
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Site Bilgileri  </h6>
									    <hr>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Mail</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											    <input type="hidden" value="../smtp-ayarlari" name="link">
												<input type="text" class="form-control" name="site_mail" value="<?=$smtp['site_mail']?>" />
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Mail Şifre</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											 
												<input type="text" class="form-control" name="site_mail_sifre"  value="<?=$smtp['site_mail_sifre']?>" />
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Mail Host</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											 
												<input type="text" class="form-control" name="site_mail_host"  value="<?=$smtp['site_mail_host']?>" />
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Mail Port</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											 
												<input type="text" class="form-control" name="site_mail_port"  value="<?=$smtp['site_mail_port']?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Gönderen Mail</h6>
											</div>
											<div class="col-sm-9 text-secondary">
											 
												<input type="text" class="form-control" name="gonderen_mail"  value="<?=$smtp['gonderen_mail']?>" />
											</div>
										</div>
										
									
										
										
								
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="smtp-kaydet" value="Kaydet " />
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						</form>
					</div>
				</div>