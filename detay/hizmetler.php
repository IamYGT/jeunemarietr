<section class="ls section_padding_top_150 section_padding_bottom_150">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
							    <?php foreach($hizmetcek as $hizmet){?>
								<div class="isotope-item col-xs-12 col-sm-4">
									<article class="vertical-item service-item content-padding big-padding with_shadow text-center">
										<div class="item-media-wrap">
											<div class="item-media"> <img src="resimler/<?=$hizmet['resim']?>" alt="<?=$hizmet['adi']?>"> <a href="<?=$hizmet['seo']?>" class="abs-link"></a> </div>
										</div>
										<div class="item-content">
											<h3 class="entry-title"> <a href="<?=$hizmet['seo']?>"><?=$hizmet['adi']?></a> </h3>
											<div class="entry-content">
												<p><?=$hizmet['onaciklama']?></p>
											</div>
										</div>
									</article>
								</div>
						<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>