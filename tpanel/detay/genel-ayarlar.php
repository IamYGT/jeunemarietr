	
	
	<div class="container">
					<div class="main-body">
					    <form method="post" action="include/post.php"  enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
									    <h6 class="mb-0 text-uppercase">Header Logo </h6>
									    <hr>
										<div class="d-flex flex-column align-items-center text-center">
											<img src="../resimler/<?=$logo?>" alt="logo" class=" p-1 " width="110">
										<input class="form-control" type="file" name="logo" id="formFile">
										</div>
										<br>
										<h6 class="mb-0 text-uppercase">Footer Logo </h6>
									    <hr>
										<div class="d-flex flex-column align-items-center text-center">
											<img src="../resimler/<?=$footerlogo?>" alt="footer_logo" class=" p-1 " width="110">
										<input class="form-control" type="file" name="footer_logo" id="formFile">
										</div>
										<br>
										<h6 class="mb-0 text-uppercase">Favicon Logo </h6>
									    <hr>
										<div class="d-flex flex-column align-items-center text-center">
											<img src="../resimler/<?=$favicon?>" alt="favicon" class=" p-1 " width="110">
										<input class="form-control" type="file" name="favicon" id="formFile">
										</div>
									
									
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
									     <h6 class="mb-0 text-uppercase">Site Bilgileri  </h6>
									    <hr>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Adı </h6>
											</div>
											<div class="col-sm-9 text-secondary">
											    <input type="hidden" value="../genel-ayarlar" name="link">
												<input type="text" class="form-control" name="site_title" value="<?=$title?>" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Açıklama </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="site_description" value="<?=$description?>"/>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Author </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="site_author" value="<?=$author?>"/>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Keyword </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="site_keyword" data-role="tagsinput" value="<?=$keyword?>">
											</div>
										</div>
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Footer Copyright  </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="copyright" value="<?=$copyright?>"/>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Renk 1   </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="color" class="form-control" name="renk1" value="<?=$renk1?>"/>
											</div>
										</div>
										
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Site Renk 2   </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="color" class="form-control" name="renk2" value="<?=$renk2?>"/>
											</div>
										</div>
										
										
											<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Head Kod   </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea class="form-control" id="inputAddress2"  name="head" rows="3"><?=$head?></textarea>
											</div>
										</div>
										
										
								
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" name="ayar-kaydet" value="Kaydet " />
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						</form>
					</div>
				</div>