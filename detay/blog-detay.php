<section class="ls section_padding_top_150 section_padding_bottom_150 columns_padding_30">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-8 col-lg-8">
							<article class="single-post post vertical-item">
								<header class="entry-header">
									<h3 class="entry-title big"> <a href="<?=$haberler['seo']?>"><?=$haberler['adi']?></a> </h3>
									<div class="entry-meta small-text big-spacing">
									
									</div>
								</header>
								<div class="item-media-wrap">
									<div class="entry-thumbnail item-media"> <img src="resimler/<?=$haberler['resim']?>" alt="<?=$haberler['adi']?>">
									
									</div>
								</div>
								<div class="item-content">
									<div class="entry-content">
										<p><?=$haberler['aciklama']?> </p>
									
									
									</div>
								
								</div>
								<!-- .item-content -->
							</article>
							
						</div>
						<!--eof .col-sm-8 (main content)-->
						<!-- sidebar -->
						<aside class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-4">
					
							<div class="widget widget_slider widget_recent_posts">
								<h3 class="widget-title">Tüm Bloglar </h3>
								<div class="owl-carousel with_shadow_items" data-nav="true" data-loop="true" data-items="1" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-responsive-xs="1">
									<?php foreach($habercek as $haber){?>
									<div class="vertical-item content-padding with_shadow">
										<div class="item-media entry-thumbnail"> <img src="resimler/<?=$haber['resim']?>" alt="<?=$haber['adi']?>">
											<div class="media-links"> <a class="abs-link" title="<?=$haber['adi']?>" href="<?=$haber['seo']?>"></a> </div>
										</div>
										<div class="item-content">
											
											<p class="darklinks"> <a href="<?=$haber['seo']?>"><?=$haber['adi']?></a> </p>
										</div>
									</div>
							<?php }?>
								</div>
							</div>
					
						
						</aside>
						<!-- eof aside sidebar -->
					</div>
				</div>
			</section>