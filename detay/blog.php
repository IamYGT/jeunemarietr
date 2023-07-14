<section class="ls section_padding_top_150 section_padding_bottom_150 columns_padding_30">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
							    <?php foreach($habercek as $haber){?>
								<div class="isotope-item col-xs-12 col-sm-6 col-md-4">
									<article class="post vertical-item content-padding big-padding with_shadow text-center">
										<div class="item-media entry-thumbnail"> <a href="<?=$haber['seo']?>">
            					<img src="resimler/<?=$haber['resim']?>" alt="<?=$haber['adi']?>">
            				</a>
										
										</div>
										<div class="item-content">
											<h3 class="entry-title small"> <a href="<?=$haber['seo']?>"><?=$haber['adi']?></a> </h3>
										</div>
									</article>
								</div>
					<?php }?>
							</div>
						
						</div>
					</div>
				</div>
			</section>