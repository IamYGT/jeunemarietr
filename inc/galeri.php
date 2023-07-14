<section id="gallery" class="ls fluid_padding_0 columns_padding_0">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12">
							<div class="owl-carousel gallery-carousel framed" data-responsive-xlg="6" data-responsive-lg="5" data-responsive-md="4" data-responsive-sm="3" data-responsive-xs="3" data-responsive-xxs="2" data-loop="true" data-margin="0" data-nav="true">
                            <?php foreach($galericek as $galeri){?>
								<div class="vertical-item">
									<div class="item-media"> <img src="resimler/<?=$galeri['resim']?>" alt="<?=$galeri['adi']?>"> <a class="abs-link prettyPhoto" data-gal="prettyPhoto[gal]" title="<?=$galeri['adi']?>" href="resimler/<?=$galeri['resim']?>">
							</a> </div>
								</div>
			<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>