<section class="ls page_portfolio section_padding_top_140 section_padding_bottom_150 columns_padding_0 container_padding_0">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<div class="isotope_container isotope row masonry-layout columns_margin_0 columns_padding_0" data-filters=".isotope_filters">
							<?php foreach($galericek as $galeri){?>
								<div class="isotope-item col-lg-3 col-md-4 col-sm-6 category-1">
									<article class="vertical-item gallery-item content-padding text-center">
										<div class="item-media"> <img src="resimler/<?=$galeri['resim']?>" alt="<?=$galeri['adi']?>">
											<div class="media-links">
												<div class="links-wrap"> <a class="p-view prettyPhoto " title="<?=$galeri['adi']?>" data-gal="prettyPhoto[gal]" href="resimler/<?=$galeri['resim']?>"></a> </div>
											</div>
										</div>
										<div class="item-content">
											<header class="entry-header">
												<h3 class="entry-title"> <a href="gallery-single.html" rel="bookmark">
								<?=$galeri['adi']?>
								</a> </h3>
											
											</header>
										</div>
									</article>
								</div>
			<?php }?>
							</div>
						
						</div>
					</div>
				</div>
			</section>